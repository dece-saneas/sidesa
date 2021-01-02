<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Visitor;
use App\Models\Article;
use App\Models\Setting;
use App\Models\Visimisi;
use App\Models\Carousel;
use App\Models\Aparatur;

class SiteController extends Controller
{
	public function __construct()
    {
		if(Cookie::get('visitor') == null) {
            Cookie::queue(Cookie::make('visitor', $this->user_ip(), 60));
            
            Visitor::create([
            'ip' => $this->user_ip(),
            'os' => $this->user_browser(),
            'browser' => $this->user_os(),
            ]);
        }      
    }
    
    public function user_ip()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    public function user_browser()
    {
        $browser = $this->_userAgent();
        return $browser['name'] . ' v.'.$browser['version'];
    }
    
    public function user_os()
    {
        $OS = $this->_userAgent();
        return $OS['platform'];
    }
    
    public function _userAgent()
    {
        $u_agent 	= $_SERVER['HTTP_USER_AGENT'];
        $bname   	= 'Unknown';
        $platform 	= 'Unknown';
        $version 	= "";
        
        $os_array   =   array(
            '/windows nt 10.0/i'    =>  'Windows 10',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
        
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $u_agent)) {
                $platform    =   $value;
                break;
            }
        }
        
        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }elseif(preg_match('/Firefox/i',$u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }elseif(preg_match('/Chrome/i',$u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i',$u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }elseif (preg_match('/Opera/i',$u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        }elseif (preg_match('/Netscape/i',$u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
        
        //  finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        
        if(!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
        
        // see how many we have
        $i = count($matches['browser']);
        if($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }else {
                $version= $matches['version'][1];
            }
        }else {
            $version= $matches['version'][0];
        }
        
        // check if we have a number
        $version = ( $version == null || $version == "" ) ? "?" : $version;
        
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'   => $pattern
        );
    }
    
    public function index()
    {
		// Kawal Corona
		$glo['data'] = Setting::get();
        
        $CURL = curl_init();
		curl_setopt($CURL, CURLOPT_URL, 'https://api.kawalcorona.com/indonesia/provinsi/');
		curl_setopt($CURL, CURLOPT_RETURNTRANSFER, 1);
		$CURL_EXEC = curl_exec($CURL);
		curl_close($CURL);
		$CURL_RESULT=json_decode($CURL_EXEC,true);
        
        $KEY = -1;
        
        foreach($CURL_RESULT as $i=>$DATA){
            if($DATA['attributes']['Provinsi'] == $glo['data'][0]->A){
                $KEY = $i;
            }
        }
        
		$covid = $CURL_RESULT[$KEY]['attributes'];
        $article = Article::latest('id')->take(4)->get();
        $visitor['day'] = Visitor::whereDay('created_at', '=', date('d'))->get();
        $visitor['month'] = Visitor::whereMonth('created_at', '=', date('m'))->get();
        $visitor['year'] = Visitor::whereYear('created_at', '=', date('Y'))->get();
        $carousel = Carousel::get();
        $aparatur = Aparatur::get();
		
		return view('home',['covid' => $covid, 'article' =>$article, 'visitor' =>$visitor, 'carousel' =>$carousel, 'aparatur' =>$aparatur]);
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function visimisi()
	{
		$visimisi = Visimisi::get();
		
		return view('visimisi',['visimisi' => $visimisi]);
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function article()
	{
        $article = Article::where('status', 'Published')->paginate(5);
		return view('article', ['article' => $article]);
	}
    
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function article_show($id)
	{
        $article = Article::find($id);
		return view('article-show', ['article' => $article]);
	}
}
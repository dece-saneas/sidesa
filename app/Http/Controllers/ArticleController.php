<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use Image;
use Auth;
use File;
use App\Models\Article;
use App\Models\ArticleComment;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function toggle($id, $type)
	{        
		$article = Article::findorFail(Crypt::decrypt($id));
		
		if(Crypt::decrypt($type) == 'review') {
			$article->status = 'In Review';
            $article->save();
			
			$commet = ArticleComment::create([
				'user_id' => NULL,
				'article_id' => Crypt::decrypt($id),
				'comment' => '<strong>'.Auth::user()->name.'</strong> Membuat artikel.',
			]);
		}
		
		return redirect()->back()->with('success', 'Artikel sedang di Review!');
	}
	
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function index()
	{
        if (auth()->user()->hasrole('Admin')) {
            $article = Article::where('status', '!=' , 'Draft')->paginate(10);
        }elseif (auth()->user()->hasrole('Jurnalis')) {
            $article = Article::where('user_id', auth()->user()->id)->paginate(10);
        }
        
		return view('dashboard.article', ['article' => $article]);
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function show($id)
	{
        $article = Article::findOrFail(Crypt::decrypt($id));
        
		return view('dashboard.article-show', ['article' => $article]);
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function create()
	{
		return view('dashboard.article-create');
	}
    
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png|max:2048',
        ]);
        
        $image = $request->file('image');
        $image_filename = time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(795, 586)->save(public_path('img/article/'.$image_filename));
        
        $article = Article::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image_filename,
            'status' => 'Draft',
        ]);
        
        if($request->save){
            return redirect()->route('article')->with('success', 'Draft artikel berhasil disimpan!');
        } else {
            $article->status = 'In Review';
            $article->save();
            $comment = ArticleComment::create([
                'user_id' => NULL,
                'article_id' => $article->id,
                'comment' => '<strong>'.Auth::user()->name.'</strong> Telah membuat artikel.',
            ]);
            return redirect()->route('article')->with('success', 'Artikel berhasil dikirim!');
        }
	}
  
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function edit($id)
	{
        $article = Article::findorFail(Crypt::decrypt($id));
        
		return view('dashboard.article-edit', ['article' => $article]);
	}
    
    public function update(Request $request, $id)
    {
        
		$article = Article::find($id);
		
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'image' => 'file|image|mimes:jpeg,png|max:2048',
        ]);

		$article->title = $request->title;
		$article->content = $request->content;
		$article->save();
        
        if($article->note != NULL) {
            $article->note = $article->note.' [Update]';
            $article->save();
        }
        
        if($request->hasFile('image')){
            File::delete('img/article/'.$article->image);
            $image = $request->file('image');
            $image_filename = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(795, 586)->save(public_path('img/article/'.$image_filename));
            $article->image = $image_filename;
            $article->save();
        }
        
        return redirect()->route('article.show', Crypt::encrypt($id))->with('success', 'Artikel berhasil di ubah!');
	}
    
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function update_confirm(Request $request, $id, $type)
    {
        if($type == 'approve') {
            $article = Article::find($id);
            $article->status = 'Approved';
            $article->note = NULL;
            $article->save();

            return redirect()->back()->with('success', 'Artikel sudah di terima!');
        }else {
            $article = Article::find($id);
            $article->status = 'Published';
            $article->save();

            return redirect()->back()->with('success', 'Artikel berhasil di publish!');
        }
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function destroy($id)
    {
        $article = Article::find($id);
        File::delete('img/article/'.$article->image);
        $article->delete();
        
        return redirect()->route('article')->with('success', 'Artikel berhasil dihapus!');
	}
    
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function comment_store(Request $request, $id)
    {
        
        $this->validate($request,[
            'comment' => 'required',
        ]);

        $comment = ArticleComment::create([
            'user_id' => Auth::user()->id,
            'article_id' => Crypt::decrypt($id),
            'comment' => $request->comment,
        ]);
		
		return redirect()->back();
	}
	
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function comment_destroy($id)
    {
        $comment = ArticleComment::find(Crypt::decrypt($id));
        $comment->delete();
        
        return redirect()->back();
	}
}

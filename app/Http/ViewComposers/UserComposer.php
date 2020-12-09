<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;

class UserComposer
{
	
	public function compose(View $view)
	{
		$composer['data'] ='';
		$view->with('composer', $composer);
	}
}
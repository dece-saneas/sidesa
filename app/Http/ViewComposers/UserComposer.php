<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Setting;

class UserComposer
{
	
	public function compose(View $view)
	{
		$glo['data'] = Setting::get();
		$view->with('glo', $glo);
	}
}
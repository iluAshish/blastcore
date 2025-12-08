<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function __construct()
	{
		// $route_name = Route::currentRouteName();
		// $page_header = PageHeader::where('route_name','=',$route_name)->first();
	    // Session()->put('page_header',$page_header);	
	    // $page_header = Session::get('page_header');
	    // dd($page_header->heading);
		
	}
}

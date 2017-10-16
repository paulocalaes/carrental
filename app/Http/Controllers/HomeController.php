<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;

class HomeController extends Controller
{
    public function showLogin()
	{
	    // show the form
	    return View::make('login');
	}

	public function ListCars()
	{
		return View::make('listCars');
	}
	
}

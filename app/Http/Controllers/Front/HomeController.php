<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
    {   
        return view('front.index');
    }

    public function sportsPerformance()
    {   
        return view('front.sportsperformance');
    }

    public function sportsWellness()
    {   
        return view('front.sportswellness');
    }

    public function fitness()
    {   
        return view('front.fitness');
    }

    public function aboutUs()
    {   
        return view('front.aboutus');
    }

    public function bodyChart()
    {   
        return view('front.bodychart');
    }

    public function login()
    {   
        return view('front.loginuser');
    }

    public function forgotPassword()
    {   
        return view('front.forgotpassword');
    }

    public function userRegister()
    {   
        return view('front.register');
    }

}

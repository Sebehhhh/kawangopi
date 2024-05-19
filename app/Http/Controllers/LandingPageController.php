<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingpage.index');
    }

    public function about()
    {
        return view('landingpage.about');
    }

    public function service()
    {
        return view('landingpage.service');
    }

    public function menu()
    {
        return view('landingpage.menu');
    }

    public function booking()
    {
        return view('landingpage.booking');
    }

    public function team()
    {
        return view('landingpage.team');
    }

    public function testimonial()
    {
        return view('landingpage.testimonial');
    }

    public function contact()
    {
        return view('landingpage.contact');
    }
}

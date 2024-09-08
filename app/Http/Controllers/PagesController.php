<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function vdashboard()
    {

        return view('dashboard');

    }
    public function content()
    {

        return view('content');
    }
    public function works()
    {

        return view('works');
    }
    public function setting()
    {

        return view('setting');
    }
    public function profil()
    {

        return view('profil');
    }
    public function search(Request $request)
    {

    //
    }
}

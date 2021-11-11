<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user'))
        {
            return view('user.userdashboard');
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            return view('admin.admindashboard');
        }
    }

    public function profil()
    {
        return view('user.profilsaya');
    }

    public function manajemenusers()
    {
        return view('admin.manajemenusers');
    }

    public function manajemenmateri()
    {
        return view('admin.manajemenmateri');
    }

    public function manajemenujikom()
    {
        return view('admin.manajemenujikom');
    }


}

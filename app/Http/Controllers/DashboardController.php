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

    public function materi()
    {
        return view('user.materi');
    }

    public function ujikom()
    {
        return view('user.ujikom');
    }

    public function grupdis()
    {
        return view('user.grupdis');
    }

    public function testi()
    {
        return view('user.testi');
    }

    public function datapengguna()
    {
        return view('admin.datapengguna');
    }

    public function tambahmateri()
    {
        return view('admin.tambahmateri');
    }

    public function buatujian()
    {
        return view('admin.buatujian');
    }

    public function datatesti()
    {
        return view('admin.datatesti');
    }

}

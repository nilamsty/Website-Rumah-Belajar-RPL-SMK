<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bab;
use App\Models\Materi;

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
        $materis=Materi::inRandomOrder()->orderBy('id', 'DESC')->paginate(5);
        return view('user.materi', compact('materis'));
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

    /*public function materis()
    {
        $materis->Materi::inRandomOrder()->orderBy('id', 'DESC')->paginate(5);
        return view('user.materi', compact('materis'));
    }*/

    public function buatujian()
    {
        return view('admin.buatujian');
    }

    public function datatesti()
    {
        return view('admin.datatesti');
    }

}

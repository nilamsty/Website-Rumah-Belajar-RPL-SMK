<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonis=Testimoni::orderBy('id', 'DESC')->get();
        return view('admin.testimoni.index', compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::get();
        return view('user.testimoni.tambah', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonis=Testimoni::create([
            'user_id'=>$request->user,
            'content'=>$request->content,
        ]);

        return back()->with('success', 'Testimoni Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        $testimonis=Testimoni::whereId($id)->first();
        return view('user.materi.tampil', compact('testimonis'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $users=User::get();
        $testimonis=Testimoni::find($id);
        return view ('user.materi.ubah', compact('users', 'testimonis'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $testimonis=Testimoni::whereId($id)->first();
        $testimonis->update([
            'user_id'=>$request->name,
            'content'=>$request->content,
        ]);

        return back()->with('success', 'Ubah Data Testimoni Berhasil!');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimoni::whereId($id)->delete();
        return back()->with('success', 'Hapus Data Testimoni Berhasil!');
    }
}

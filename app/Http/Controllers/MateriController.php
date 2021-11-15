<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bab;
use App\Models\Materi;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materis=Materi::orderBy('id', 'DESC')->paginate();
        return view('admin.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $babs=Bab::get();
        return view('admin.materi.tambah', compact('babs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materis=Materi::create([
            'bab_id'=>$request->bab,
            'title'=>$request->title,
            'content'=>$request->content,
        ]);
        return back()->with('success', 'Materi Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materis=Materi::whereId($id)->first();
        return view('admin.materi.tampil', compact('materis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $babs=Bab::get();
        $materis=Materi::find($id);
        return view ('admin.materi.ubah', compact('babs', 'materis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materis=Materi::whereId($id)->first();
        $materis->update([
            'bab_id'=>$request->bab,
            'tittle'=>$request->tittle,
            'content'=>$request->content,
        ]);

        return back()->with('success', 'Ubah Data Materi Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materi::whereId($id)->delete();
        return back()->with('success', 'Hapus Data Materi Berhasil!');
    }
}
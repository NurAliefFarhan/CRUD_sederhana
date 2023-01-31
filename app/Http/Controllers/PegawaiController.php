<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function home()
    {
        $pegawais = Pegawai::all();
        return view('dashboard.home', compact('pegawais'));
    }

    public function inputData(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:25',
            'divisi' => 'required',
            'umur' => 'required',
            'jk' => 'required',
        ]);
        // tambah data ke db bagian table users
        Pegawai::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'umur' => $request->umur,
            'jk' => $request->jk,
        ]);
        return redirect('/')->with('success', 'Anda berhasil membuat data pegawai!'); //mereturn / lewat / , bukan lewat name yang diberikan 
    }

    public function destroy($id)
    {
        Pegawai::where('id', '=', $id)->delete(); 
        return redirect()->route('home')->with('successDelete', 'Berhasil menghapus data pegawai!'); 
    }


    public function edit($id)
    {
        $pegawais = Pegawai::Where('id', $id)->first();
        return view('dashboard.edit', compact('pegawais'));
    }

    public function update(Request $request, $id)
    {
        //validasi
        $request->validate([
            'nama' => 'required|min:3|max:25',
            'divisi' => 'required',
            'umur' => 'required',
            'jk' => 'required',
        ]);
        //tambah data ke database
        // Lending::create($request->all());
        Pegawai::where('id', $id)->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'umur' => $request->umur,
            'jk' => $request->jk,
        ]);
        //redirect apabila berhasil bersama dengan alert-nya
        return redirect()->route('home')->with('successUpdate','Berhasil mengupdate data pegawai!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    // public function edit(Pegawai $pegawai)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Pegawai $pegawai)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Pegawai $pegawai)
    // {
    //     //
    // }
}

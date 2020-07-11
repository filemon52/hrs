<?php

namespace App\Http\Controllers;

use App\gambar;
use App\stok;
use App\kendaraan;
use Ramsey\Uuid\Uuid;
use App\knalpot;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{	/*
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $stok = stok::all();
    return view('admin.index', compact('stok'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $knalpot = knalpot::all();
       $kendaraan = kendaraan::all();
    return view('admin.create', compact('kendaraan','knalpot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
        'nama'=>'required',
        'harga'=>'required'
      ]);
     if ($request->file('file')==null) {
        $gambar = null;
     }else{
        $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
     }
     $kendaraan = kendaraan::where('nama_kendaraan',$request->get('kendaraan'))->get();
        kendaraan::where('nama_kendaraan',$request->get('kendaraan'))->update(['knalpot'=>($kendaraan[0]->knalpot+1)]);
      $stok = new Stok([
        'id_stok' => Uuid::uuid4(),
        'nama_stok' => $request->get('nama'),
        'harga' => $request->get('harga'),
        'knalpot' => $request->get('knalpot'),
        'qty' => $request->get('qty'),
        'tipe' => $request->get('tipe'),
        'gambar' => 0,
        'jenis' => $kendaraan[0]->jenis,
        'kendaraan' => $kendaraan[0]->nama_kendaraan,
        'merk' => $kendaraan[0]->merk,
        'display' => $gambar
      ]);
      $stok->save();
      return redirect('/admin')->with('success', 'Stok has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok = stok::find($id);
       $knalpot = knalpot::all();
       $kendaraan = kendaraan::all();
        return view('admin.edit', compact('stok','kendaraan','knalpot'));
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
     $request->validate([
        'nama'=>'required',
        'harga'=>'required'
      ]);
     $belum = Stok::find($id)->get();
     $kendaraan = kendaraan::where('nama_kendaraan',$request->get('kendaraan'))->get();
     if ($belum[0]->kendaraan!=$request->get('kendaraan')) {
        kendaraan::where('nama_kendaraan',$request->get('kendaraan'))->update(['knalpot'=>($kendaraan[0]->knalpot+1)]);
     $sebelum = kendaraan::where('nama_kendaraan',$belum[0]->kendaraan)->get();
        kendaraan::where('nama_kendaraan',$belum[0]->kendaraan)->update(['knalpot'=>($sebelum[0]->knalpot-1)]);
     }
        $stok = Stok::find($id);
        $stok->nama_stok = $request->get('nama');
        $stok->harga = $request->get('harga');
        $stok->knalpot = $request->get('knalpot');
        $stok->qty = $request->get('qty');
        $stok->tipe = $request->get('tipe');
        $stok->jenis = $kendaraan[0]->jenis;
        $stok->kendaraan = $kendaraan[0]->nama_kendaraan;
        $stok->merk = $kendaraan[0]->merk;
     if ($request->file('file')!=null) {
        $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
        $stok->display = $gambar;
     }
      $stok->save();
      return redirect('/admin')->with('success', 'Stok has been update');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $stok = Stok::find($id);
     $isi = Stok::where('id_stok',$id)->get();
     $kendaraan = Kendaraan::where('nama_kendaraan',$isi[0]->kendaraan)->get();
     kendaraan::where('id_kendaraan',$kendaraan[0]->id_kendaraan)->update(['knalpot'=>($kendaraan[0]->knalpot-1)]);
     $gambar = Gambar::where('id_stok',$id)->delete();
     $stok->delete();

     return redirect('/admin')->with('success', 'Stok has been deleted Successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\kendaraan;
use App\merk;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class KendaraanController extends Controller
{    /**
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
       $kendaraan = Kendaraan::all();
    return view('kendaraan.index', compact('kendaraan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $merk = merk::all();
    return view('kendaraan.create', compact('merk'));
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
        'nama_kendaraan'=>'required',
        'jenis'=>'required',
        'merk'=>'required',
      ]);
     if ($request->file('file')==null) {
        $gambar = null;
     }else{
        $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
     }
      $kendaraan = new Kendaraan([
        'id_kendaraan' => Uuid::uuid4(),
        'nama_kendaraan' => $request->get('nama_kendaraan'),
        'knalpot' => 0,
        'jenis' => $request->get('jenis'),
        'merk' => $request->get('merk'),
        'gambar' => $gambar
      ]);
        if ($kendaraan->jenis=="Mobil") {
            $merk = merk::where('nama_merk',$request->get('merk'))->get('mobil');
        merk::where('nama_merk',$request->get('merk'))->update(['mobil'=>($merk[0]->mobil+1)]);
        }else{            
            $merk = merk::where('nama_merk',$request->get('merk'))->get('motor');
        merk::where('nama_merk',$request->get('merk'))->update(['motor'=>($merk[0]->motor+1)]);
        }
      $kendaraan->save();
      return redirect('/kendaraan')->with('success', 'Kendaraan has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = Kendaraan::find($id);
        $merk = merk::all();
        return view('kendaraan.edit', compact('kendaraan','merk'));
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
        'nama_kendaraan'=>'required',
        'jenis'=>'required',
        'merk'=>'required',
     ]);
        $kendaraan = Kendaraan::find($id);
        $kendaraan->nama_kendaraan = $request->get('nama_kendaraan');
        $kendaraan->jenis = $request->get('jenis');
        $kendaraan->merk = $request->get('merk');
        $file = $request->file('file');
     if ($request->file('file')!=null) {
     $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
        $kendaraan->gambar = $gambar;
        }
            $merkkendaraan = Kendaraan::where('id_kendaraan',$id)->get();
            if ($merkkendaraan[0]->merk==$request->get('merk')&&$merkkendaraan[0]->jenis==$request->get('jenis')) {
      $kendaraan->save();
            }else{
        if ($merkkendaraan[0]->jenis=="Mobil") {
            $belum = merk::where('nama_merk',$merkkendaraan[0]->merk)->get('mobil');
        merk::where('nama_merk',$merkkendaraan[0]->merk)->update(['mobil'=>($belum[0]->mobil-1)]);
        }else{            
            $belum = merk::where('nama_merk',$merkkendaraan[0]->merk)->get('motor');
        merk::where('nama_merk',$merkkendaraan[0]->merk)->update(['motor'=>($belum[0]->motor-1)]);
        }
        if ($kendaraan->jenis=="Mobil") {
            $merk = merk::where('nama_merk',$request->get('merk'))->get('mobil');
        merk::where('nama_merk',$request->get('merk'))->update(['mobil'=>($merk[0]->mobil+1)]);
        }else{            
            $merk = merk::where('nama_merk',$request->get('merk'))->get('motor');
        merk::where('nama_merk',$request->get('merk'))->update(['motor'=>($merk[0]->motor+1)]);
        }
      $kendaraan->save();
      }
      return redirect('/kendaraan')->with('success', 'Kendaraan has been update');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $kendaraan = Kendaraan::find($id);
     $merkkendaraan = Kendaraan::find($id)->get();
     if ($merkkendaraan[0]->jenis=="Mobil") {
            $belum = merk::where('nama_merk',$merkkendaraan[0]->merk)->get('mobil');
        merk::where('nama_merk',$merkkendaraan[0]->merk)->update(['mobil'=>($belum[0]->mobil-1)]);
        }else{            
            $belum = merk::where('nama_merk',$merkkendaraan[0]->merk)->get('motor');
        merk::where('nama_merk',$merkkendaraan[0]->merk)->update(['motor'=>($belum[0]->motor-1)]);
        }
     $kendaraan->delete();

     return redirect('/kendaraan')->with('success', 'Kendaraan has been deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\merk;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class MerkController extends Controller
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
       $merk = Merk::all();
    return view('merk.index', compact('merk'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $merk = Merk::all();
    return view('merk.create', compact('merk'));
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
        'nama_merk'=>'required'
      ]);
     if ($request->file('file')==null) {
        $gambar = null;
     }else{
        $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
     }
      $merk = new Merk([
        'nama_merk' => $request->get('nama_merk'),
        'gambar' => $gambar,
        'id_merk' => Uuid::uuid4()
      ]);
      $merk->save();
      return redirect('/merk')->with('success', 'Merk has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = Merk::find($id);
        return view('merk.edit', compact('merk'));
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
        'nama_merk'=>'required'
      ]);
        $merk = Merk::find($id);
        $merk->nama_merk = $request->get('nama_merk');
        $file = $request->file('file');
     if ($request->file('file')!=null) {
     $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
        $merk->gambar = $gambar;
        }
      $merk->save();
      return redirect('/merk')->with('success', 'Merk has been update');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $merk = Merk::find($id);
     $merk->delete();

     return redirect('/merk')->with('success', 'Merk has been deleted Successfully');
    }
}

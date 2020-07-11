<?php

namespace App\Http\Controllers;

use App\Knalpot;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator;
use App\Http\Controllers\Controller; 

class KnalpotController extends Controller
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
       $knalpot = Knalpot::all();
    return view('knalpot.index', compact('knalpot'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('knalpot.create');
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
        'nama_knalpot'=>'required',
      ]);
     if ($request->file('file')==null) {
        $gambar = null;
     }else{
        $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
     }
      $knalpot = new Knalpot([
        'nama_knalpot' => $request->get('nama_knalpot'),
        'gambar' => $gambar,
        'id_knalpot' => Uuid::uuid4()
      ]);
      $knalpot->save();
      return redirect('/knalpot')->with('success', 'Knalpot has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $knalpot = Knalpot::find($id);
        return view('knalpot.edit', compact('knalpot'));
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
        'nama_knalpot' =>'required'
      ]);
        $knalpot = Knalpot::find($id);
        $knalpot->nama_knalpot = $request->get('nama_knalpot');
        $file = $request->file('file');
     if ($request->file('file')!=null) {
     $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
        $knalpot->gambar = $gambar;
        }
        $knalpot->save();
      return redirect('/knalpot')->with('success', 'Knalpot has been update');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $knalpot = Knalpot::find($id);
     $knalpot->delete();

     return redirect('/knalpot')->with('success', 'Knalpot has been deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\gambar;
use App\stok;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Validator;

class GambarController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id =$request->get('id');
        $gambar = Gambar::where('id_stok',$id)->get()->count();
        $no = ($gambar+1);
    return view('gambar.create', compact('id','no'));
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
     if ($request->file('file')!=null) {
        $update = gambar::find($id);
     $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
        $update->gambar = $gambar;
      $update->save();
        }
      return redirect('/admin')->with('success', 'Gambar has been update');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     if ($request->file('file')==null) {
        $gambar = null;
     }else{
        $gambar = base64_encode(file_get_contents($request->file('file')->getRealPath()));
     }
     $request->validate([
        'file'=>'required',
        'id_stok'=>'required',
        'no'=>'required',
      ]);
      $gambar = new Gambar([
        'gambar' => $gambar,
        'no' => $request->get('no'),
        'id_stok' => $request->get('id_stok'),
      ]);
      stok::where('id_stok',$request->get('id_stok'))->update(['gambar'=>$request->get('no')]);
      $gambar->save();
      return redirect('/admin')->with('success', 'Gambar has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gambar = Gambar::orderBy('no', 'ASC')->where('id_stok',$id)->get();
        return view('gambar.edit', compact('gambar','id'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gambar = Gambar::where('id_gambar',$id)->get();
        return view('gambar.show', compact('gambar'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $gambar = Gambar::find($id);
     $id_stok = Gambar::find($id)->get();
     $stok = Stok::where('id_stok',$id_stok[0]->id_stok)->get();
     stok::where('id_stok',$id_stok[0]->id_stok)->update(['gambar'=>($stok[0]->gambar-1)]);
     $gambar->delete();

     return redirect('/admin')->with('success', 'Gambar has been deleted Successfully');
    }
}

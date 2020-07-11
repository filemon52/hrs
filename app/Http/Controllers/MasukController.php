<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\masuk;
use App\stok;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masuk = Masuk::all();
    return view('masuk.index', compact('masuk'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
    return Masuk::all();
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
    public $successStatus = 200;
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
        'nama'=>'required',
        'jenis'=>'required',
        'kendaraan'=>'required',
        'merk'=>'required',
        'tipe'=>'required',
        'qty'=>'required',
        'harga'=>'required',
        'id_stok'=>'required'
        ]);
    if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 201);            
        }
        $masuk = new Masuk;
        $stok = $request->id_stok;
        $qty = $request->qty;
        $masuk->id_masuk = Uuid::uuid4()->getHex();
        $masuk->nama = $request->nama;
        $masuk->jenis = $request->jenis;
        $masuk->kendaraan = $request->kendaraan;
        $masuk->merk = $request->merk;
        $masuk->tipe = $request->tipe;
        $masuk->qty= $request->qty;
        $masuk->harga= $request->harga;
        $masuk->id_stok= $request->id_stok;
        $masuk->total_harga= $request->harga*$request->qty;
        $masuk->save();
        $sqty = Stok::where('id_stok',$stok) -> get('qty');
        $qtys = $sqty[0]['qty'];
        $qtyn = $qtys+$qty;
        Stok::where('id_stok',$stok) -> update(['qty'=>$qtyn]);
        $success['nama'] =  $masuk->nama;
        $success['merk'] =  $masuk->merk;
        $success['qty'] =  $masuk->qty;
        $success['tipe'] =  $masuk->tipe;
        $success['harga'] =  $masuk->harga;
        $success['kendaraan'] =  $masuk->kendaraan;
        $success['jenis'] =  $masuk->jenis;
            return response()->json(['data'=>$success], $this-> successStatus); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit( $masuk)
    {
        return Masuk::where('id_masuk',$masuk) -> get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $masuk)
    {
        $stok = $request->id_stok;
        $qty = $request->qty;
        $sqty = Stok::where('id_stok',$stok) -> get('qty');
        $mqty = Masuk::where('id_masuk',$masuk) -> get('qty');
        $harga = Masuk::where('id_masuk',$masuk) -> get('harga');
        $ntys = $mqty[0]['qty'];
        $qtys = $sqty[0]['qty'];
        $htys = $harga[0]['harga']*$qty;
        $qtyn = $qtys-$ntys+$qty;
        Masuk::where('id_masuk',$masuk)->update(['qty'=>$qty,'total_harga'=>$htys]);
        return Stok::where('id_stok',$stok) -> update(['qty'=>$qtyn]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($masuk)
    {
        Masuk::where('id_masuk',$masuk) -> delete();

        return response()->json(204);
    }
}

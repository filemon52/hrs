<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\keluar;
use App\stok;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller; 

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluar = keluar::all();
    return view('keluar.index', compact('keluar'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
    return Keluar::all();
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
        $keluar = new Keluar;
        $stok = $request->id_stok;
        $qty = $request->qty;
        $keluar->id_keluar = Uuid::uuid4()->getHex();
        $keluar->nama = $request->nama;
        $keluar->jenis = $request->jenis;
        $keluar->kendaraan = $request->kendaraan;
        $keluar->merk = $request->merk;
        $keluar->tipe = $request->tipe;
        $keluar->qty= $qty;
        $keluar->harga= $request->harga;
        $keluar->id_stok= $stok;
        $keluar->total_harga= $request->harga*$request->qty;
        $keluar->save();
        $sqty = Stok::where('id_stok',$stok) -> get('qty');
        $qtys = $sqty[0]['qty'];
        $qtyn = $qtys-$qty;
        Stok::where('id_stok',$stok) -> update(['qty'=>$qtyn]);
        $success['nama'] =  $keluar->nama;
        $success['merk'] =  $keluar->merk;
        $success['qty'] =  $keluar->qty;
        $success['tipe'] =  $keluar->tipe;
        $success['harga'] =  $keluar->harga;
        $success['kendaraan'] =  $keluar->kendaraan;
        $success['jenis'] =  $keluar->jenis;
            return response()->json(['data'=>$success], $this-> successStatus); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(keluar $keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit( $keluar)
    {
        return Keluar::where('id_keluar',$keluar) -> get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $keluar)
    {
        $stok = $request->id_stok;
        $qty = $request->qty;
        $sqty = Stok::where('id_stok',$stok) -> get('qty');
        $mqty = Keluar::where('id_keluar',$keluar) -> get('qty');
        $harga = Keluar::where('id_keluar',$keluar) -> get('harga');
        $ntys = $mqty[0]['qty'];
        $qtys = $sqty[0]['qty'];
        $htys = $harga[0]['harga']*$qty;
        $qtyn = $qtys+$ntys-$qty;
        Keluar::where('id_keluar',$keluar)->update(['qty'=>$qty,'total_harga'=>$htys]);
        return Stok::where('id_stok',$stok) -> update(['qty'=>$qtyn]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($keluar)
    {
        Keluar::where('id_keluar',$keluar) -> delete();

        return response()->json(204);
    }
}

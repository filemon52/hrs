<?php 

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\stok;
use Illuminate\Http\Request;
use App\gambar;
use App\merk;
use App\kendaraan;
use Validator;
use App\Http\Controllers\Controller; 

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->take(3)->get();
        $jumlah = count($stok);
        if ($jumlah>0) {
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->take(3)->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $gambar[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $stok[$i]->setAttribute('gambar',$gambar[$i]);
            }
        }else{
            $stok = null;
        }
    return view('menu', compact('stok'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item()
    {
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('jenis','=','Mobil')->take(3)->get();
        $jumlah = count($stok);
        if ($jumlah>0) {
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('jenis','=','Mobil')->take(3)->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $gambar[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $stok[$i]->setAttribute('gambar',$gambar[$i]);
            }
        }else{
            $stok = null;
        }
        $motor = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('jenis','=','Motor')->take(3)->get();
        $jumlahs = count($motor);
        if ($jumlahs>0) {
        $id_stoks = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('jenis','=','Motor')->take(3)->get('id_stok');
        for ($i=0; $i < $jumlahs; $i++) { 
            $ids = $id_stoks[$i];
            $gambars[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $motor[$i]->setAttribute('gambar',$gambars[$i]);
            }
        }else{
            $motor = null;
        }
    return view('stok.index', compact('motor','stok'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mobil()
    {
        $stoks = Stok::where('gambar','>',0)->where('jenis',"Mobil")->get();
        $banyaks = count($stoks);
        if ($banyaks>0) {
        for ($s=0; $s < $banyaks; $s++) { 
        $kendaraan = kendaraan::where('nama_kendaraan',$stoks[$s]->kendaraan)->get();
        }
        $kendaraans = count($kendaraan);
        for ($b=0; $b < $kendaraans; $b++) { 
        $nama_merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Mobil','>',0)->get('nama_merk');
        $merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Mobil','>',0)->get();
        }
        $banyak = count($merk);
        for ($a=0; $a < $banyak; $a++) { 
        $names = $nama_merk[$a];
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('merk',$names['nama_merk'])->where('jenis','=','Mobil')->take(3)->get();
        $jumlah = count($stok);
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('merk',$names['nama_merk'])->where('jenis','=','Mobil')->take(3)->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $gambar[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $stok[$i]->setAttribute('gambar',$gambar[$i]);
            }
           $merk[$a]->setAttribute('stok',$stok);
        }
    return view('stok.mobil', compact('merk'));
        }else{
        $merk = null;
    return view('stok.mobil', compact('merk'));            
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mobils()
    {
        $stoks = Stok::where('gambar','>',0)->where('jenis',"Mobil")->get();
        $banyaks = count($stoks);
        if ($banyaks > 0) {
        for ($s=0; $s < $banyaks; $s++) { 
        $kendaraan = kendaraan::where('nama_kendaraan',$stoks[$s]->kendaraan)->get();
        }
        $kendaraans = count($kendaraan);
        for ($b=0; $b < $kendaraans; $b++) { 
        $nama_merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Mobil','>',0)->get('nama_merk');
        $merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Mobil','>',0)->get();
        }
        $banyak = count($merk);
        for ($a=0; $a < $banyak; $a++) { 
        $names = $nama_merk[$a];
        $stok = kendaraan::whereNotNull('gambar')->orderBy('created_at','desc')->where('merk',$names['nama_merk'])->where('jenis','=','Mobil')->where('knalpot','>','0')->take(3)->get();
           $merk[$a]->setAttribute('stok',$stok);
       }
    return view('stok.mobils', compact('merk'));
        }else{
            $merk = null;
    return view('stok.mobils', compact('merk'));            
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function motor()
    {
        $stoks = Stok::where('gambar','>',0)->where('jenis',"Motor")->get();
        $banyaks = count($stoks);
        if ($banyaks>0) {
        for ($s=0; $s < $banyaks; $s++) { 
        $kendaraan = kendaraan::where('nama_kendaraan',$stoks[$s]->kendaraan)->get();
        }
        $kendaraans = count($kendaraan);
        for ($b=0; $b < $kendaraans; $b++) { 
        $nama_merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Motor','>',0)->get('nama_merk');
        $merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Motor','>',0)->get();
        }
        $banyak = count($merk);
        for ($a=0; $a < $banyak; $a++) { 
        $names = $nama_merk[$a];
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('merk',$names['nama_merk'])->where('jenis','=','Motor')->take(3)->get();
        $jumlah = count($stok);
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('merk',$names['nama_merk'])->where('jenis','=','Motor')->take(3)->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $gambar[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $stok[$i]->setAttribute('gambar',$gambar[$i]);
            }
           $merk[$a]->setAttribute('stok',$stok);
        }
    return view('stok.motor', compact('merk'));
        }else{
            $merk = null;
    return view('stok.motor', compact('merk'));            
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function motors()
    {
        $stoks = Stok::where('gambar','>',0)->where('jenis',"Motor")->get();
        $banyaks = count($stoks);
        if ($banyaks>0) {
        for ($s=0; $s < $banyaks; $s++) { 
        $kendaraan = kendaraan::where('nama_kendaraan',$stoks[$s]->kendaraan)->get();
        }
        $kendaraans = count($kendaraan);
        for ($b=0; $b < $kendaraans; $b++) { 
        $nama_merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Motor','>',0)->get('nama_merk');
        $merk = Merk::where('nama_merk',$kendaraan[$b]->merk)->where('Motor','>',0)->get();
        }
        $banyak = count($merk);
        for ($a=0; $a < $banyak; $a++) { 
        $names = $nama_merk[$a];
        $stok = kendaraan::whereNotNull('gambar')->orderBy('created_at','desc')->where('merk',$names['nama_merk'])->where('jenis','=','Motor')->where('knalpot','>','0')->take(3)->get();
           $merk[$a]->setAttribute('stok',$stok);
        }
    return view('stok.motors', compact('merk'));
        }else{
            $merk = null;
    return view('stok.motors', compact('merk'));

        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        return Stok::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function gambar($stok)
    {
        return Gambar::where('id_stok',$stok) -> get();
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
        'nama_stok'=>'required',
        'jenis'=>'required',
        'kendaraan'=>'required',
        'merk'=>'required',
        'tipe'=>'required',
        'qty'=>'required',
        'knalpot'=>'required',
        'harga'=>'required'
        ]);
    if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 201);            
        }
        $stok = new Stok;
        $stok->id_stok = Uuid::uuid4()->getHex();
        $stok->nama_stok = $request->nama_stok;
        $stok->jenis = $request->jenis;
        $stok->kendaraan = $request->kendaraan;
        $stok->merk = $request->merk;
        $stok->tipe = $request->tipe;
        $stok->qty= $request->qty;
        $stok->knalpot= $request->knalpot;
        $stok->harga= $request->harga;
        $stok->save();
        $jumlah = kendaraan::where('nama_kendaraan',$stok->kendaraan) -> get('knalpot');
        $baru = $jumlah[0]->knalpot+1;
        kendaraan::where('nama_kendaraan',$stok->kendaraan) -> update(['knalpot'=>$baru]);
        $success['nama_stok'] =  $stok->nama_stok;
        $success['merk'] =  $stok->merk;
        $success['qty'] =  $stok->qty;
        $success['knalpot'] =  $stok->knalpot;
        $success['tipe'] =  $stok->tipe;
        $success['harga'] =  $stok->harga;
        $success['kendaraan'] =  $stok->kendaraan;
        $success['jenis'] =  $stok->jenis;
            return response()->json(['data'=>$success], $this-> successStatus); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show($stoks)
    {
           $image = Gambar::where('id_stok',$stoks)->get('gambar');
           $stok = Stok::where('id_stok',$stoks) -> get();
           $kendaraan = Stok::where('id_stok',$stoks) -> get('kendaraan');
           $id_kendaraan = kendaraan::where('nama_kendaraan',$kendaraan[0]->kendaraan)->get('id_kendaraan');
           $stok[0]->setAttribute('image',$image);
        $other = Stok::where('gambar','>','0')->where('knalpot','Hrs')->take(2)->where('id_stok','!=',$stoks)->orderBy('created_at','desc')->where('kendaraan',$stok[0]->kendaraan)->orWhereNull('id_stok')->get();
        $jumlah = count($other);
        if ($jumlah>0) {
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->take(2)->where('id_stok','!=',$stoks)->orderBy('created_at','desc')->where('kendaraan',$other[0]->kendaraan)->orWhereNull('id_stok')->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $images[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $other[$i]->setAttribute('images',$images[$i]);
            }
    return view('stok.show', compact('stok','other','id_kendaraan'));
        }else{
    return view('stok.show', compact('stok','other','id_kendaraan'));
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function shows($stok)
    {
        $kendaraan = kendaraan::whereNotNull('gambar')->orderBy('created_at','desc')->where('id_kendaraan',$stok)->get();
        $nama = kendaraan::whereNotNull('gambar')->orderBy('created_at','desc')->where('id_kendaraan',$stok)->get('nama_kendaraan');
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('kendaraan',$nama[0]->nama_kendaraan)->get();
    return view('stok.shows', compact('stok','kendaraan'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function merkmobil($merkmobil)
    {
        $kendaraan = kendaraan::where('knalpot','>','0')->where('merk',$merkmobil)->where('jenis','Mobil')->get();
        $nama_kendaraan = kendaraan::where('knalpot','>','0')->where('merk',$merkmobil)->where('jenis','Mobil')->get('nama_kendaraan');
        $banyak = count($kendaraan);
        for ($a=0; $a < $banyak; $a++) { 
        $names = $nama_kendaraan[$a];
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('kendaraan',$names['nama_kendaraan'])->where('jenis','=','Mobil')->get();
        $jumlah = count($stok);
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('kendaraan',$names['nama_kendaraan'])->where('jenis','=','Mobil')->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $gambar[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $stok[$i]->setAttribute('gambar',$gambar[$i]);
            }
           $kendaraan[$a]->setAttribute('stok',$stok);
    }
    return view('stok.merkmobil', compact('kendaraan'));
}
    /**
     * Display a listing of the resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function merkmobils($merkmobil)
    {
       $kendaraan = kendaraan::whereNotNull('gambar')->orderBy('created_at','desc')->where('merk',$merkmobil)->where('jenis','=','Mobil')->where('knalpot','>','0')->get();
        return view('stok.merkmobils', compact('kendaraan','merkmobil'));
    }
    
    public function merkkendaraan($merkkendaraan)
    {
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('kendaraan',$merkkendaraan)->get();
        $jumlah = count($stok);
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('kendaraan',$merkkendaraan)->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $gambar[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $stok[$i]->setAttribute('gambar',$gambar[$i]);
            }
    return view('stok.merkkendaraan', compact('stok'));
}
    /**
     * Display a listing of the resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function merkmotor($merkmotor)
    {
        $kendaraan = kendaraan::where('knalpot','>','0')->where('merk',$merkmotor)->where('jenis','Motor')->get();
        $nama_kendaraan = kendaraan::where('knalpot','>','0')->where('merk',$merkmotor)->where('jenis','Motor')->get('nama_kendaraan');
        $banyak = count($kendaraan);
        for ($a=0; $a < $banyak; $a++) { 
        $names = $nama_kendaraan[$a];
        $stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('kendaraan',$names['nama_kendaraan'])->where('jenis','=','Motor')->get();
        $jumlah = count($stok);
        $id_stok = Stok::where('gambar','>','0')->where('knalpot','Hrs')->orderBy('created_at','desc')->where('kendaraan',$names['nama_kendaraan'])->where('jenis','=','Motor')->get('id_stok');
        for ($i=0; $i < $jumlah; $i++) { 
            $ids = $id_stok[$i];
            $gambar[$i] = Gambar::where('id_stok',$ids['id_stok'])->get();
           $stok[$i]->setAttribute('gambar',$gambar[$i]);
            }
           $kendaraan[$a]->setAttribute('stok',$stok);
    }
    return view('stok.merkmotor', compact('kendaraan'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function merkmotors($merkmotor)
    {
       $kendaraan = kendaraan::whereNotNull('gambar')->orderBy('created_at','desc')->where('merk',$merkmotor)->where('jenis','=','Motor')->where('knalpot','>','0')->get();
        return view('stok.merkmotors', compact('kendaraan','merkmotor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit( $stok)
    {
        return Stok::where('id_stok',$stok) -> get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stok)
    {
        return Stok::where('id_stok',$stok) -> update($request->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($stok)
    {
        $kendaraan = Stok::where('id_stok',$stok) -> get('kendaraan');
        $jumlah = kendaraan::where('nama_kendaraan',$kendaraan[0]->kendaraan) -> get('knalpot');
        $baru = $jumlah[0]->knalpot-1;
        kendaraan::where('nama_kendaraan',$kendaraan[0]->kendaraan) -> update(['knalpot'=>$baru]);
        $res = Stok::where('id_stok',$stok) -> delete();

        return response()->json($res);
    }
}

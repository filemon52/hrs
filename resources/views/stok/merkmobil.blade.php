@extends('nav')

@section('content')
<style>
#desc{
  position: absolute;
  bottom: 1px;
  width: 100%;
  background: linear-gradient(rgba(255,255,255,0.5), rgba(155,155,155,0.5), rgba(55,55,55,0.5));
  visibility: hidden;
  opacity: 0;
  transition: visibility 0.5s, opacity 0.5s linear;
  }
a:hover #desc{
  visibility: visible;
  opacity: 1;
}
#des{
  color: black;
  margin-left: 20px;
  font-size: 12px;
}
#item{display: inline-block;width: 29%;height: 160px;margin: 1%; border: 1px solid #C4C4C4;position: relative;}
@media screen and (max-width: 700px) {
#item{
display: block;width: 98%;
}
</style>
<div class="uper">
        <input type="number" id="banyak" value="{{count($kendaraan)}}" style="display: none">
        @foreach($kendaraan as $kendaraans)
        <p><a href="{{ url('/merkkendaraan',$merkkendaraan=$kendaraans->nama_kendaraan) }}" style="margin-left: 1%">{{$kendaraans->nama_kendaraan}} >></a></p>
        <input type="number" id="total" value="{{count($kendaraans->stok)}}" style="display: none">
        <p style="display: none;">{{$super = $loop->iteration}}</p>
        @foreach($kendaraans->stok as $stoks)
        <p style="display: none;">{{$index = $loop->iteration}}</p>
        <div id="item">
        <a href="{{ route('stok.show',$id_stok=$stoks->id_stok)}}">
        @foreach($stoks->gambar as $gambar)
   <img src="data:image/jpeg;base64,{{$gambar->gambar}}" id="gambar{{$super}}{{$index}}{{$gambar->no}}" style="width: 100%;height: 160px;"> 
        @endforeach
    <div id="desc">
          <p id="des">{{$stoks->nama_stok}}</p>
          <p id="des">{{$stoks->merk}} {{$stoks->kendaraan}}</p>
          <p id="des">Rp.{{$stoks->harga}}</p>
        </div>
    </a>
    </div>
    <input type="number" name="angka" id="angka{{$super}}{{$index}}" value="{{count($stoks->gambar)}}" style="display: none;">
        @endforeach

        @endforeach
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script language="JavaScript">
   var total = document.getElementById('total').value;
   var banyak = document.getElementById('banyak').value;
    var waktu = 1500;
    function Rotate(Holder,Super,Gambar){
   var angka = document.getElementById('angka'+(Super+1)+(Holder+1));
   var jumlah = angka.value;
      for (var i = 1; i <= jumlah; i++) {
       document.getElementById('gambar'+(Super+1)+(Holder+1)+i).style.display = "none";
      }
    if(jumlah<Gambar)
      Gambar=Gambar%jumlah;
    if (Gambar==0) {
      Gambar=jumlah;
    }
    var show = document.getElementById('gambar'+(Super+1)+(Holder+1)+Gambar).style.display = "block";
     window.setTimeout("Rotate("+(Holder)+","+(Super)+","+(Gambar+1)+")",waktu);
     }
     for (var a = 0; a < banyak; a++) {
     for (var b = 0; b < total; b++) {
       Rotate(b,a,1);
     }
     }
        </script>
@endsection

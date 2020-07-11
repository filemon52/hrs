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
    <p><a href="{{ url('/mobil') }}" style="margin-left: 1%">Mobil >></a></p>
      @if($stok == null)
      <p style="margin-left: 5%">Tidak Ada Barang</p>
      @else
        @foreach($stok as $stoks)
        <p style="display: none;">{{$index = $loop->iteration}}</p>
        <div id="item">
        <a href="{{ route('stok.show',$id_stok=$stoks->id_stok)}}">
        @foreach($stoks->gambar as $gambar)
   <img src="data:image/jpeg;base64,{{$gambar->gambar}}" id="gambar{{$index}}{{$gambar->no}}" style="width: 100%;height: 160px;"> 
        @endforeach
        <div id="desc">
          <p id="des">{{$stoks->nama_stok}}</p>
          <p id="des">{{$stoks->merk}} {{$stoks->kendaraan}}</p>
          <p id="des">Rp.{{$stoks->harga}}</p>
        </div>
    </a>
    </div>
    <input type="number" name="angka" class="angka" value="{{count($stoks->gambar)}}" style="display: none;">
        @endforeach
        @endif
    <p><a href="{{ url('/motor') }}" style="margin-left: 1%">Motor >></a></p>
      @if($motor == null)
      <p style="margin-left: 5%">Tidak Ada Barang</p>
      @else
        <input type="number" id="totals" value="{{count($motor)+count($stok)}}" style="display: none">
        @foreach($motor as $stoks)
        <p style="display: none;">{{$index = $loop->iteration}}</p>
        <div id="item">
        <a href="{{ route('stok.show',$id_stok=$stoks->id_stok)}}">
        @foreach($stoks->gambar as $gambar)
   <img src="data:image/jpeg;base64,{{$gambar->gambar}}" id="gambar{{$index+count($stok)}}{{$gambar->no}}" style="width: 100%;height: 160px;"> 
        @endforeach
        <div id="desc">
          <p id="des">{{$stoks->nama_stok}}</p>
          <p id="des">{{$stoks->merk}} {{$stoks->kendaraan}}</p>
          <p id="des">Rp.{{$stoks->harga}}</p>
        </div>
    </a>
    </div>
    <input type="number" name="angka" class="angka" value="{{count($stoks->gambar)}}" style="display: none;">
        @endforeach
        @endif
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script language="JavaScript">
   var totals = document.getElementById('totals').value;
   var angka = document.getElementsByClassName('angka');
    var waktu = 1500;
    function Rotate(Holder,Gambar){
   var jumlah = angka[Holder].value;
      for (var i = 1; i <= jumlah; i++) {
       document.getElementById('gambar'+(Holder+1)+i).style.display = "none";
      }
    if(jumlah<Gambar)
      Gambar=Gambar%jumlah;
    if (Gambar==0) {
      Gambar=jumlah;
    }
    var show = document.getElementById('gambar'+(Holder+1)+Gambar).style.display = "block";
     window.setTimeout("Rotate("+(Holder)+","+(Gambar+1)+")",waktu);
     }
     for (var a = 0; a < totals; a++) {
       Rotate(a,1);
     }
   </script>
@endsection

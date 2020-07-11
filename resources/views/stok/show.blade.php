@extends('nav')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
        @foreach($stok as $stoks)
        <div id="Rotating" style="display: block;">
        @foreach($stoks->image as $gambar)
    <img src="data:image/jpeg;base64,{{$gambar->gambar}}" id="gambar{{$loop->iteration}}" style="width: 100%;height: 300px;min-height: 250px" allowfullscreen=""> 
        @endforeach
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div style="display: inline-block;margin-left: 3%;">
    <div style="display: block;">
    <div style="display: inline-block;">
    <p style="font-size: 13px">Nama</p>
    <p style="font-size: 20px;line-height: 22px">{{$stoks->nama_stok}}</p>
    <p style="font-size: 13px">Harga</p>
    <p style="font-size: 20px;line-height: 22px">{{$stoks->harga}}</p>      
    </div>
    <div style="display: inline-block;position: absolute;margin-left: 5%">
    <p style="font-size: 20px;line-height: 22px">{{$stoks->merk}}</p>
    @foreach($id_kendaraan as $kendaraan)
    <p style="font-size: 20px;line-height: 22px"><a href="{{ url('/shows',$id_kendaraan=$kendaraan->id_kendaraan) }}">{{$stoks->kendaraan}}</a></p>
    @endforeach
    </div>
    </div>
    <div style="display: block;">
      <p style="border: 1px solid #C4C4C4;border-radius: 5px;background-color: #C4C4C4;text-align: center;padding: 10px 20px">
      <a href="" style="font-size: 15px;line-height: 17px">Pesan</a>
      </p>
    </div>
    </div>
    <input type="number" name="angka" id="angka" value="{{count($stoks->image)}}" style="display: none;">
        @endforeach
    <div style="display: inline-block;margin-left: 10%;">
      @if(count($other) == 0)
      <p>Tidak Ada Barang Lain</p>
      @else
      @foreach($other as $others)
    <input type="number" name="angka" id="total" value="{{count($other)}}" style="display: none;">
    <p style="display: none;">{{$index = $loop->iteration}}</p>
    <a href="{{ route('stok.show',$id_stok=$others->id_stok)}}">
    <div style="display: inline-block;height: 200px">
        @foreach($others->images as $gambar)
    <img src="data:image/jpeg;base64,{{$gambar->gambar}}" id="gambar{{$index}}{{$gambar->no}}" style="width: 100%;height: 100%" allowfullscreen=""> 
        @endforeach
    </div>
    </a>
    <input type="number" name="angka" id="gb{{$loop->iteration}}" value="{{count($others->images)}}" style="display: none;">
        @endforeach
        @endif
    </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script language="JavaScript">
   var angka = document.getElementById('angka').value;
    document.addEventListener("dragover", function(e){
    e = e || window.event;
    var dragX = e.pageX, dragY = e.pageY;
    if (dragX==0) {
      dragX=1
    }
    var isix = dragX%360;
        var der = 360/angka;
        for (var i = 0; i < isix; i=i+der){
            var a = i/der;
          }
          Rotate(a);
          }, false);
      $("body").bind("dragover", function(e){
          var dragX = e.pageX, dragY = e.pageY;
          });
    function Rotate(Gambar){
          for (var i = 1; i <= angka; i++) {
           document.getElementById('gambar'+i).style.display = "none";
          }
        if(angka<Gambar)
          Gambar=Gambar%angka;
        if (Gambar==0) {
          Gambar=angka;
        }
        document.getElementById('gambar'+Gambar).style.display = "block";
         }
         Rotate(1);
   var waktu = 1500;
   var total = document.getElementById('total').value;
    function Rotating(Holder,Gambar){
   var angka = document.getElementById('gb'+(Holder));
   var jumlah = angka.value;
      for (var i = 1; i <= jumlah; i++) {
       document.getElementById('gambar'+(Holder)+i).style.display = "none";
      }
    if(jumlah<Gambar)
      Gambar=Gambar%jumlah;
    if (Gambar==0) {
      Gambar=jumlah;
    }
    document.getElementById('gambar'+Holder+Gambar).style.display = "block";
     window.setTimeout("Rotating("+Holder+","+(Gambar+1)+")",waktu);
     }
     for (var a = 1; a <= total; a++) {
       Rotating(a,1);
     }
   </script>
 @endsection
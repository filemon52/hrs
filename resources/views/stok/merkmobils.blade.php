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
<p style="margin: 10px 30px 10px 30px;font-size: 20px">{{$merkmobil}}</p>
<div class="uper" style="margin-left: 5%">
  <p>
        @foreach($kendaraan as $kendaraans)
        <div id="item">
        <a href="{{ url('/shows',$merkkendaraan=$kendaraans->id_kendaraan) }}">
   <img src="data:image/jpeg;base64,{{$kendaraans->gambar}}" style="width: 100%;height: 160px;"> 
    <div id="desc">
          <p id="des">{{$kendaraans->merk}} {{$kendaraans->nama_kendaraan}}</p>
        </div>
    </a>
    </div>
        @endforeach
        </p>
</div>
@endsection

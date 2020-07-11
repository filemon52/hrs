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
      @if($merk == null)
      <p style="margin-left: 5%">Tidak Ada Barang</p>
      @else
        @foreach($merk as $merks)
        <p><a href="{{ url('/merkmobils',$merkmobil=$merks->nama_merk) }}" style="margin-left: 1%">{{$merks->nama_merk}} >></a></p>
        <input type="number" id="total" value="{{count($merks->stok)}}" style="display: none">
        <p style="display: none;">{{$super = $loop->iteration}}</p>
        @foreach($merks->stok as $stoks)
        <p style="display: none;">{{$index = $loop->iteration}}</p>
        <div id="item">
        <a href="{{ url('/shows',$id_kendaraan=$stoks->id_kendaraan) }}">
   <img src="data:image/jpeg;base64,{{$stoks->gambar}}" style="width: 100%;height: 160px;"> 
    <div id="desc">
          <p id="des">{{$stoks->merk}} {{$stoks->nama_kendaraan}}</p>
        </div>
    </a>
    </div>
        @endforeach

        @endforeach
        @endif
</div>
@endsection

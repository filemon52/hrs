@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Sub Materi
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
      <form method="post" action="{{ route('admin.update', $stok->id_stok) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="nama">Nama Stok</label>
              <input type="text" class="form-control" name="nama" value="{{$stok->nama_stok}}" />
          </div>
          <div class="form-group">
              @csrf
              <label for="qty">Qty</label>
              <input type="number" class="form-control" name="qty" value="{{$stok->qty}}" />
          </div>
          <div class="form-group">
              @csrf
              <label for="harga">Harga</label>
              <input type="number" class="form-control" name="harga" value="{{$stok->harga}}" />
          </div>
          <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" name="file">
          </div>
          <div class="form-group">
              <label for="knalpot">Merk Knalpot</label>
              <select name="knalpot" name="knalpot">
               <option value="{{$stok->knalpot}}">{{$stok->knalpot}}</option>
               @foreach($knalpot as $knalpot)
               <option value="{{$knalpot->nama_knalpot}}">{{$knalpot->nama_knalpot}}</option>
               @endforeach
                 </select>
          </div>
          <div class="form-group">
              <label for="kendaraan">Kendaraan</label>
              <select name="kendaraan">
               <option value="{{$stok->kendaraan}}">{{$stok->kendaraan}}</option>
               @foreach($kendaraan as $kendaraan)
               <option value="{{$kendaraan->nama_kendaraan}}">{{$kendaraan->nama_kendaraan}}</option>
               @endforeach
                 </select>
          </div>
          <div class="form-group">
              <label for="tipe">tipe</label>
              <select name="tipe">
               <option value="{{$stok->tipe}}">{{$stok->tipe}}</option>
               <option value="Sand">Sand</option>
               <option value="Carbon">Carbon</option>
                 </select>
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
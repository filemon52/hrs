@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Kendaraan
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
      <form method="post" action="{{ route('kendaraan.update', $kendaraan->id_kendaraan) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="nama_kendaraan">Nama</label>
              <input type="text" class="form-control" name="nama_kendaraan" value="{{ $kendaraan->nama_kendaraan }}"/>
          </div>
          <div class="form-group">
              <label for="nama">Merk</label>
              <select name="merk" name="merk">
               <option value="{{$kendaraan->merk}}">{{$kendaraan->merk}}</option>
               @foreach($merk as $merk)
               <option value="{{$merk->nama_merk}}">{{$merk->nama_merk}}</option>
               @endforeach
                 </select>
          </div>
          <div class="form-group">
              <label for="nama">Jenis</label>
              <select name="jenis" name="jenis">
               <option value="{{$kendaraan->jenis}}">{{$kendaraan->jenis}}</option>
               <option value="Motor">Motor</option>
               <option value="Mobil">Mobil</option>
                 </select>
          </div>
          <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" name="file">
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
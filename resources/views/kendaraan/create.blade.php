@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Kendaraan
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
      <form method="post" action="{{ route('kendaraan.store') }}" enctype="multipart/form-data">
              @csrf
          <div class="form-group">
              <label for="nama_kendaraan">Nama</label>
              <input type="text" class="form-control" name="nama_kendaraan"/>
          </div>
          <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" name="file">
          </div>
          <div class="form-group">
              <label for="nama">Merk</label>
              <select name="merk" name="merk">
               @foreach($merk as $merk)
               <option value="{{$merk->nama_merk}}">{{$merk->nama_merk}}</option>
               @endforeach
                 </select>
          </div>
          <div class="form-group">
              <label for="nama">Jenis</label>
              <select name="jenis" name="jenis">
               <option value="Motor">Motor</option>
               <option value="Mobil">Mobil</option>
                 </select>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
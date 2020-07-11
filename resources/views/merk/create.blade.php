@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Isi Materi
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
      <form method="post" action="{{ route('merk.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama_merk"/>
          </div>
          <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" name="file">
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
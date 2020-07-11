@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Knalpot
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
      <form method="post" action="{{ route('knalpot.update', $knalpot->id_knalpot) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="nama_knalpot">Nama:</label>
          <input type="text" class="form-control" name="nama_knalpot" value={{ $knalpot->nama_knalpot }} />
        </div>
        <div class="form-group">
          <label for="gambar">Gambar:</label>
          <input type="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
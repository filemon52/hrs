@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Admin
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
      <form method="post" action="{{ route('knalpot.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Nama:</label>
              <input type="text" class="form-control" name="nama_knalpot"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">Gambar:</label>
              <input type="file" name="file">
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
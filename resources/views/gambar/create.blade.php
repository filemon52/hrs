@extends('layouts.template')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Materi
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
      <form method="post" action="{{ route('gambar.store') }}" enctype="multipart/form-data">
              @csrf
          <div class="form-group">
              <label for="judul">Gambar {{$no}}</label>
              <input type="file" name="file">
              <input type="number" class="form-control" name="no" value="{{$no}}" style="display: none;" />
              <input type="text" class="form-control" name="id_stok" value="{{$id}}" style="display: none;" />
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
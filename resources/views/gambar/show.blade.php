@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
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
        @foreach($gambar as $gambar)
            <img src="data:image/jpeg;base64,{{$gambar->gambar}}" style="width: 150px;height: 100px;">
              <form method="post" action="{{ route('gambar.update', $gambar->id_gambar) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="gambar">Gambar {{$gambar->no}}</label>
              <input type="file" name="file">
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
        @endforeach

<div>
@endsection
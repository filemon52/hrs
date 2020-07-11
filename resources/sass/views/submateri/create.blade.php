@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Sub Materi
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
      <form method="post" action="{{ route('submateri.store') }}">
          <div class="form-group">
              @csrf
              <label for="submateri">Nama Sub Materi:</label>
              <input type="text" class="form-control" name="submateri"/>
          </div>
          <div class="form-group">
              <label for="nama">Nama Materi :</label>
              <select name="materi">
               @foreach($materi as $materi)
               <option value="{{$materi->id_materi}}">{{$materi->judul_materi}}</option>
               @endforeach
                 </select>
          </div>
          <div class="form-group">
              <label for="gambar">Link Image Google Drive</label>
              <input type="text" class="form-control" name="gambar"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
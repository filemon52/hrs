@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Soal
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
      <form method="post" action="{{ route('soal.store') }}">
          <div class="form-group">
              <label for="nama">Judul Soal:</label>
              <select name="id_sub_materi">
               @foreach($submateri as $submateri)
               <option value="{{$submateri->id_sub_materi}}">{{$submateri->judul_sub_materi}}</option>
               @endforeach
                 </select>
          </div>
              @csrf
          <div class="form-group">
              <label for="soal">Soal</label>
              <textarea type="text" class="form-control" name="soal"></textarea>
          </div>
          <div class="form-group">
              <label for="a">Jawaban A</label>
              <textarea type="text" class="form-control" name="a"></textarea>
          </div>
          <div class="form-group">
              <label for="b">Jawaban B</label>
              <textarea type="text" class="form-control" name="b"></textarea>
          </div>
          <div class="form-group">
              <label for="c">Jawaban C</label>
              <textarea type="text" class="form-control" name="c"></textarea>
          </div>
          <div class="form-group">
              <label for="d">Jawban D</label>
              <textarea type="text" class="form-control" name="d"></textarea>
          </div>
              <label for="jawaban">Jawban Benar</label>
              <select name="jawaban">
               <option value="a">a</option>
               <option value="b">b</option>
               <option value="c">c</option>
               <option value="d">d</option>
                 </select>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
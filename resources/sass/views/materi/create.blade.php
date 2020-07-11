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
      <form method="post" action="{{ route('materi.store') }}">
              @csrf
          <div class="form-group">
              <label for="judul">Judul:</label>
              <input type="text" class="form-control" name="judul"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ route('materi.create')}}">Add Materi</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Judul</td>
          <td>Action</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($materi as $materi)
        <tr>
            <td>{{$materi->id_materi}}</td>
            <td>{{$materi->judul_materi}}</td>
            <td><a href="{{ route('materi.edit',$materi->id_materi)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('materi.destroy', $materi->id_materi)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
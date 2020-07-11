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
  <a href="{{ route('submateri.create')}}">Add Sub Materi</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>ID Materi</td>
          <td>Judul</td>
          <td>Gambar</td>
          <td>Action</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($submateri as $submateri)
        <tr>
            <td>{{$submateri->id_sub_materi}}</td>
            <td>{{$submateri->id_materi}}</td>
            <td>{{$submateri->judul_sub_materi}}</td>
            <td>{{$submateri->gambar_sub_materi}}</td>
            <td><a href="{{ route('submateri.edit',$submateri->id_sub_materi)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('submateri.destroy', $submateri->id_sub_materi)}}" method="post">
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
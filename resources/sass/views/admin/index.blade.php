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
  <a href="{{ route('admin.create')}}">Add Admin</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nama</td>
          <td>Email</td>
          <td>Action</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($admin as $admin)
        <tr>
            <td>{{$admin->id_admin}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td><a href="{{ route('admin.edit',$admin->id_admin)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('admin.destroy', $admin->id_admin)}}" method="post">
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
<div class="uper">
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
<div class="uper">
  <a href="{{ route('submateri.create')}}">Add Sub Materi</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>ID Materi</td>
          <td>Judul</td>
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
<div class="uper">
  <a href="{{ route('isimateri.create')}}">Add Isi Materi</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>ID Sub Materi</td>
          <td>Header1</td>
          <td>Header2</td>
          <td>Header3</td>
          <td>Header4</td>
          <td>Action</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($isimateri as $isimateri)
        <tr>
            <td>{{$isimateri->id_isi}}</td>
            <td>{{$isimateri->id_sub_materi}}</td>
            <td>{{$isimateri->header1}}</td>
            <td>{{$isimateri->header2}}</td>
            <td>{{$isimateri->header3}}</td>
            <td>{{$isimateri->header4}}</td>
            <td><a href="{{ route('isimateri.edit',$isimateri->id_isi)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('isimateri.destroy', $isimateri->id_isi)}}" method="post">
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
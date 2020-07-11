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
  <a href="{{ route('merk.create')}}">Add Merk</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nama</td>
          <td>Mobil</td>
          <td>Motor</td>
          <td>Gambar</td>
          <td>Action</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($merk as $merk)
        <tr>
            <td>{{$merk->nama_merk}}</td>
            <td>{{$merk->mobil}}</td>
            <td>{{$merk->motor}}</td>
            <td><img src="data:image/jpeg;base64,{{$merk->gambar}}" style="width: 100px;height: 80px;"></td>
            <td><a href="{{ route('merk.edit',$merk->id_merk)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('merk.destroy', $merk->id_merk)}}" method="post">
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
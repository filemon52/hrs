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
  <a href="{{ route('kendaraan.create')}}">Add Kendaraan</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nama</td>
          <td>Merk</td>
          <td>Gambar</td>
          <td>Action</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($kendaraan as $kendaraan)
        <tr>
            <td>{{$kendaraan->nama_kendaraan}}</td>
            <td>{{$kendaraan->merk}}</td>
            <td><img src="data:image/jpeg;base64,{{$kendaraan->gambar}}" style="width: 100px;height: 80px;"></td>
            <td><a href="{{ route('kendaraan.edit',$kendaraan->id_kendaraan)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('kendaraan.destroy', $kendaraan->id_kendaraan)}}" method="post">
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
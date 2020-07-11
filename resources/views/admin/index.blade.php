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
  <a href="{{ route('admin.create')}}">Add Stok</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nama</td>
          <td>Merk</td>
          <td>Kendaraan</td>
          <td>Knalpot</td>
          <td>Tipe</td>
          <td>Qty</td>
          <td>Harga</td>
        </tr>
    </thead>
    <tbody>
        @foreach($stok as $stok)
        <tr>
            <td>{{$stok->nama_stok}}</td>
            <td>{{$stok->merk}}</td>
            <td>{{$stok->kendaraan}}</td>
            <td>{{$stok->knalpot}}</td>
            <td>{{$stok->tipe}}</td>
            <td>{{$stok->qty}}</td>
            <td>{{$stok->harga}}</td>
            <td><img src="data:image/jpeg;base64,{{$stok->display}}" style="width: 100px;height: 80px;"></td>
            <td><a href="{{ route('gambar.edit',$stok->id_stok)}}" class="btn btn-primary">Tambah Gambar</a></td>
            <td><a href="{{ route('admin.edit',$stok->id_stok)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('admin.destroy', $stok->id_stok)}}" method="post">
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
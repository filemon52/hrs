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
  <a href="{{ route('knalpot.create')}}">Add Knalpot</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nama</td>
          <td>Gambar</td>
          <td>Action</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($knalpot as $knalpot)
        <tr>
            <td>{{$knalpot->nama_knalpot}}</td>
            <td><img src="data:image/jpeg;base64,{{$knalpot->gambar}}" style="width: 100px;height: 80px;"></td>
            <td><a href="{{ route('knalpot.edit',$knalpot->id_knalpot)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('knalpot.destroy', $knalpot->id_knalpot)}}" method="post">
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
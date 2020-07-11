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
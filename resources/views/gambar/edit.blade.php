@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
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
  <a href="{{ route('gambar.create',['id'=>$id])}}">Add Gambar</a>
  <table class="table table-striped">
        <tr>
        @foreach($gambar as $gambar)
            <td style="position: relative;"><a href="{{ route('gambar.show',$gambar->id_gambar)}}" class="btn btn-primary" id="edit">Edit</a><form action="{{ route('gambar.destroy', $gambar->id_gambar)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" id="delete">Delete</button>
                </form><img src="data:image/jpeg;base64,{{$gambar->gambar}}" style="width: 150px;height: 100px;position: relative;"></td>
        @endforeach
        </tr>
  </table>
<div>
@endsection
<style type="text/css">
  .btn{
    position: absolute;
    z-index: 1;
  }
  #edit{
    visibility: hidden;
    opacity: 0;
    transition: visibility 0.5s, opacity 0.5s linear;
      margin-top: 30px;
    margin-left: 20px;
  }
  #delete{
    visibility: hidden;
    opacity: 0;
    transition: visibility 0.5s, opacity 0.5s linear;
    margin-top: 30px;
    margin-left: 70px;
  }
  td:hover #delete{
  visibility: visible;
  opacity: 1;
  }
  td:hover #edit{
  visibility: visible;
  opacity: 1;
  }
</style>
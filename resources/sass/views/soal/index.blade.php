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
  <a href="{{ route('soal.create')}}">Add Soal</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>ID Sub Materi</td>
          <td>Soal</td>
          <td>a</td>
          <td>b</td>
          <td>c</td>
          <td>d</td>
          <td>Jawaban</td>
        </tr>
    </thead>
    <tbody>
        @foreach($soal as $soal)
        <tr>
            <td>{{$soal->id_soal}}</td>
            <td>{{$soal->id_sub_materi}}</td>
            <td>{{$soal->soal}}</td>
            <td>{{$soal->a}}</td>
            <td>{{$soal->b}}</td>
            <td>{{$soal->c}}</td>
            <td>{{$soal->d}}</td>
            <td>{{$soal->jawaban}}</td>
            <td><a href="{{ route('soal.edit',$soal->id_soal)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('soal.destroy', $soal->id_soal)}}" method="post">
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
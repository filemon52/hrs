@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Isi Materi
  </div>
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
      <form method="post" action="{{ route('isimateri.update', $isimateri->id_isi) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="header1">Header 1</label>
              <input type="text" class="form-control" name="header1" value={{ $isimateri->header1 }} />
          </div>
          <div class="form-group">
              <label for="image1">Link Image Google Drive 1</label>
              <input type="text" class="form-control" name="image1" value={{ $isimateri->image1 }} />
          </div>
          <div class="form-group">
              <label for="paragraf1">Paragraf 1</label>
              <textarea type="text" class="form-control" name="paragraf1">{{ $isimateri->paragraf1 }} </textarea>
          </div>
          <div class="form-group">
              <label for="header2">Header 2</label>
              <input type="text" class="form-control" name="header2" value={{ $isimateri->header2 }} />
          </div>
          <div class="form-group">
              <label for="image2">Link Image Google Drive 2</label>
              <input type="text" class="form-control" name="image2" value={{ $isimateri->image2 }} />
          </div>
          <div class="form-group">
              <label for="paragraf2">Paragraf 2</label>
              <textarea type="text" class="form-control" name="paragraf2">{{ $isimateri->paragraf2 }}</textarea>
          </div>
          <div class="form-group">
              @csrf
              <label for="header3">Header 3</label>
              <input type="text" class="form-control" name="header3" value={{ $isimateri->header3 }} />
          </div>
          <div class="form-group">
              <label for="image3">Link Image Google Drive 3</label>
              <input type="text" class="form-control" name="image3" value={{ $isimateri->image3 }} />
          </div>
          <div class="form-group">
              <label for="paragraf3">Paragraf 3</label>
              <textarea type="text" class="form-control" name="paragraf3">{{ $isimateri->paragraf3 }}</textarea>
          </div>
          <div class="form-group">
              <label for="header4">Header 4</label>
              <input type="text" class="form-control" name="header4" value={{ $isimateri->header4 }} />
          </div>
          <div class="form-group">
              <label for="image4">Link Image Google Drive 4</label>
              <input type="text" class="form-control" name="image4" value={{ $isimateri->image4 }} />
          </div>
          <div class="form-group">
              <label for="paragraf4">Paragraf 4</label>
              <textarea type="text" class="form-control" name="paragraf4">{{ $isimateri->paragraf4 }}</textarea>
          </div>
          <div class="form-group">
              <label for="header5">Header 5</label>
              <input type="text" class="form-control" name="heade5" value="{{ $isimateri->header5 }}" />
          </div>
          <div class="form-group">
              <label for="image5">Link Image Google Drive 5</label>
              <input type="text" class="form-control" name="image5" value="{{ $isimateri->image5 }}" />
          </div>
          <div class="form-group">
              <label for="paragraf5">Paragraf 5</label>
              <textarea type="text" class="form-control" name="paragraf5">{{ $isimateri->paragraf5 }}</textarea>
          </div>
          <div class="form-group">
              <label for="header6">Header 6</label>
              <input type="text" class="form-control" name="header6" value="{{ $isimateri->header6 }}" />
          </div>
          <div class="form-group">
              <label for="image6">Link Image Google Drive 6</label>
              <input type="text" class="form-control" name="image6" value="{{ $isimateri->image6 }}" />
          </div>
          <div class="form-group">
              <label for="paragraf6">Paragraf 6</label>
              <textarea type="text" class="form-control" name="paragraf6">{{ $isimateri->paragraf6 }}</textarea>
          </div>
          <div class="form-group">
              <label for="header7">Header 7</label>
              <input type="text" class="form-control" name="header7" value="{{ $isimateri->header7 }}" />
          </div>
          <div class="form-group">
              <label for="image7">Link Image Google Drive 7</label>
              <input type="text" class="form-control" name="image7" value="{{ $isimateri->image7 }}" />
          </div>
          <div class="form-group">
              <label for="paragraf7">Paragraf 7</label>
              <textarea type="text" class="form-control" name="paragraf7">{{ $isimateri->paragraf7 }}</textarea>
          </div>
          <div class="form-group">
              <label for="header8">Header 8</label>
              <input type="text" class="form-control" name="header8"  value="{{ $isimateri->header8 }}" />
          </div>
          <div class="form-group">
              <label for="image8">Link Image Google Drive 8</label>
              <input type="text" class="form-control" name="image8" value="{{ $isimateri->image8 }}" />
          </div>
          <div class="form-group">
              <label for="paragraf8">Paragraf 8</label>
              <textarea type="text" class="form-control" name="paragraf8">{{ $isimateri->paragraf8 }}</textarea>
          </div>
          <div class="form-group">
              <label for="header9">Header 9</label>
              <input type="text" class="form-control" name="header9" value="{{ $isimateri->header9 }}" />
          </div>
          <div class="form-group">
              <label for="image9">Link Image Google Drive 9</label>
              <input type="text" class="form-control" name="image9" value="{{ $isimateri->image9 }}" />
          </div>
          <div class="form-group">
              <label for="paragraf9">Paragraf 9</label>
              <textarea type="text" class="form-control" name="paragraf9">{{ $isimateri->paragraf9 }}</textarea>
          </div>
          <div class="form-group">
              <label for="header10">Header 10</label>
              <input type="text" class="form-control" name="header10" value="{{ $isimateri->header10 }}" />
          </div>
          <div class="form-group">
              <label for="image10">Link Image Google Drive 10</label>
              <input type="text" class="form-control" name="image10" value="{{ $isimateri->image10 }}" />
          </div>
          <div class="form-group">
              <label for="paragraf10">Paragraf 10</label>
              <textarea type="text" class="form-control" name="paragraf10">{{ $isimateri->paragraf10 }}</textarea>
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
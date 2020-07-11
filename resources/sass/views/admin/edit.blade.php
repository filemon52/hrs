@extends('layouts.template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Admin
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
      <form method="post" action="{{ route('admin.update', $admin->id_admin) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nama:</label>
          <input type="text" class="form-control" name="name" value={{ $admin->name }} />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" class="form-control" name="email" value={{ $admin->email }} />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="password" value={{ $admin->password }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
@extends('layout.main')

@section('container')

<div class="card">
  <h5 class="card-header">{{$title}}</h5>

  @if(session()->has('Sukses'))
  <div class="alert alert-success mt-2 mr-3 ml-3" role="alert">
  {{ session('Sukses') }}
</div>
  @endif


  <div class="card-body">
    <form method="POST" action="add">
      {{ csrf_field() }}
      
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
    @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
    @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
    @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror  
</div>

  <button type="submit" class="btn btn-primary">Simpan</button>

     
 
</form>
  </div>
</div>


@endsection
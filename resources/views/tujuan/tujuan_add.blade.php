@extends('layout.main')

@section('container')

<div class="card">
  <h5 class="card-header">{{$title}}</h5>

  @if(session()->has('Sukses'))
  <div class="alert alert-success mt-2 mr-3 ml-3" role="alert">
  {{ session('Sukses') }}
</div>
  @endif
  @if(session()->has('Hapus'))
  <div class="alert alert-danger mt-2 mr-3 ml-3" role="alert">
  {{ session('Hapus') }}
</div>
  @endif
  @if(session()->has('Edit'))
  <div class="alert alert-warning mt-2 mr-3 ml-3" role="alert">
  {{ session('Edit') }}
</div>
  @endif

  <div class="card-body">
    <form method="POST" action="add">
      {{ csrf_field() }}
      
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
    @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"></textarea>
    @error('alamat')
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
    <label>Telepon</label>
    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon">
    @error('telepon')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror  
</div>
  <div class="form-group">
    <label>Penanggung Jawab</label>
    <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab">
    @error('penanggung_jawab')
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
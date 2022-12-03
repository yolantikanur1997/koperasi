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
    <label>Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
    @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>
  <div class="form-group">
    <label>Akun</label>
    <textarea class="form-control @error('akun') is-invalid @enderror" id="akun" name="akun"></textarea>
    @error('akun')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>
  <div class="form-group">
    <label>Nomor Rekening</label>
    <input type="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" id="nomor_rekening" name="nomor_rekening">
    @error('nomor_rekening')
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
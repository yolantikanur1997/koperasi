@extends('layout.main')

@section('container')
<!-- table -->
<div class="card">
  <div class="card-header" style="width:100%;">
  Edit Data Pengguna
  </div>
  @if(session()->has('Sukses'))
  <div class="alert alert-success mt-2 mr-3 ml-3" role="alert">
  {{ session('Sukses') }}
</div>
  @endif
  <div class="card-body">
  <div class="form-group">
      <form method="POST" action="{{ url('pengguna/update', $pengguna->id ) }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ $pengguna->nama }}">
        </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ $pengguna->email }}">
      </div>
      </div>
      <button class="btn btn-primary" type="submit">Ubah</button>

	</form>

  </div>



<!-- table -->
@endsection



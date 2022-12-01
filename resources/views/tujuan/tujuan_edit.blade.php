@extends('layout.main')

@section('container')
<!-- table -->
<div class="card">
  <div class="card-header" style="width:100%;">
  Edit Data Tujuan
  </div>
  @if(session()->has('Sukses'))
  <div class="alert alert-success mt-2 mr-3 ml-3" role="alert">
  {{ session('Sukses') }}
</div>
  @endif
  <div class="card-body">
  <div class="form-group">
      <form method="POST" action="{{ url('tujuan/update', $tujuan->id ) }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ $tujuan->nama }}">
        </div>
        <div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat">{{ $tujuan->alamat }}</textarea>
  </div>
  <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ $tujuan->email }}">
      </div>
  <div class="form-group">
    <label>Telepon</label>
    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $tujuan->telepon }}">
</div>
  <div class="form-group">
    <label>Penanggung Jawab</label>
    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{ $tujuan->penanggung_jawab }}">
</div>

      </div>
      <button class="btn btn-primary" type="submit">Ubah</button>

	</form>

  </div>



<!-- table -->
@endsection



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
      <form method="POST" action="{{ url('bank/update', $bank->id ) }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ $bank->nama }}">
        </div>
        <div class="form-group">
    <label>Akun</label>
    <textarea class="form-control" id="akun" name="akun">{{ $bank->akun }}</textarea>
  </div>
  <div class="form-group">
        <label>Nomor Rekening</label>
        <input type="text" class="form-control" name="nomor_rekening" id="nomor_rekening" value="{{ $bank->nomor_rekening }}">
      </div>

 

      </div>
      <button class="btn btn-primary" type="submit">Ubah</button>

	</form>

  </div>



<!-- table -->
@endsection



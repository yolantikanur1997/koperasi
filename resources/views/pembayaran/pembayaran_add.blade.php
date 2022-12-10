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
    <label>PIC</label>
    <select name="id_pengguna" id="id_pengguna" class="form-control select2">
      <option value="">Pilih</option>
    @foreach($pengguna as $p)
                <option value="{{$p->id}}">{{$p->nama}}</option>
                @endforeach
                </select>
    @error('id_pengguna')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>
  <div class="form-group">
    <label>Tagihan</label>
    <select name="id_tagihan" id="id_tagihan" class="form-control select2">
      <option value="">Pilih</option>
    @foreach($tagihan as $t)
                <option value="{{$t->id}}">{{$t->nomor_tagihan}}</option>
                @endforeach
                </select>
    @error('id_tagihan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div> 
 
  <div class="form-group">
    <label>Kode Faktur</label>
    <select name="kode_faktur" id="kode_faktur" class="form-control select2">
      <option value="">Pilih</option>
      <option value="010">010</option>
      <option value="020">020</option>
      <option value="030">103</option>
      <option value="040">040</option>
      <option value="050">050</option>
      <option value="060">060</option>
      <option value="070">070</option>
      <option value="080">080</option>
      <option value="090">090</option>
        </select>
    @error('kode_faktur')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>

  <div class="form-group">
    <label>Tanggal</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
    @error('tanggal')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div>

  <div class="form-group">
    <label>Status</label>
    <select name="status" id="status" class="form-control select2">
      <option value="">Pilih</option>
      <option value="Proses">Proses</option>
      <option value="Disetujui">Disetujui</option>
      <option value="Closed">Closed</option>
        </select>
    @error('status')
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
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
    <label>Faktur</label>
    <select name="id_faktur" id="id_faktur" class="form-control select2">
      <option value="">Pilih</option>
    @foreach($faktur as $t)
                <option value="{{$t->id}}">{{$t->kode_faktur}} | {{$t->nomor_faktur}}</option>
                @endforeach
                </select>
    @error('id_faktur')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
  </div> 
  <div class="form-group">
    <label>Bank</label>
    <select name="id_bank" id="id_bank" class="form-control select2">
      <option value="">Pilih</option>
    @foreach($bank as $b)
                <option value="{{$b->id}}">{{$b->nama}} | {{$b->akun}} | {{$b->nomor_rekening}}</option>
                @endforeach
                </select>
    @error('id_bank')
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
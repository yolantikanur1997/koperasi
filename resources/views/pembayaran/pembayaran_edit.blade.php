@extends('layout.main')

@section('container')
<!-- table -->
<div class="card">
  <div class="card-header" style="width:100%;">
  Edit Data Pembayaran
  </div>
  @if(session()->has('Sukses'))
  <div class="alert alert-success mt-2 mr-3 ml-3" role="alert">
  {{ session('Sukses') }}
</div>
  @endif
  <div class="card-body">
  <div class="form-group">
      <form method="POST" action="{{ url('pembayaran/update', $pembayaran->id ) }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label>PIC</label>
        <select name="id_pengguna" id="id_pengguna" class="form-control select2">
      <option value="">Pilih</option>
        @foreach($pengguna as $p)
        <option value="{{ $p->id }}" {{ $p->id == $pembayaran->id_pengguna  ? 'selected' : '' }}>{{ $p->nama }}</option>
        @endforeach
          </select>
        </div>
      <div class="form-group">
        <label>Faktur</label>
        @foreach($faktur as $f)
        <input type="text" class="form-control" value="{{ $f->nomor_faktur }}" disabled>
        @endforeach
        </div>
        <div class="form-group">
        <label>Bank</label>
        <select name="id_pengguna" id="id_pengguna" class="form-control select2">
      <option value="">Pilih</option>
        @foreach($bank as $b)
        <option value="{{ $b->id }}" {{ $b->id == $pembayaran->id_bank  ? 'selected' : '' }}>{{$b->nama}} | {{$b->akun}} | {{$b->nomor_rekening}}</option>
        @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pembayaran->tanggal }}">
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control select2" name="status" id="status">
          <option value="Proses"{{ $pembayaran->status=="Proses" ? 'selected' : ''}}>Proses</option>
          <option value="Disetujui"{{ $pembayaran->status=="Disetujui" ? 'selected' : ''}}>Disetujui</option>
          <option value="Closed"{{ $pembayaran->status=="Closed" ? 'selected' : ''}}>Closed</option>
        </select>
        </div>

 

      </div>
      <button class="btn btn-primary" type="submit">Ubah</button>

	</form>

  </div>



<!-- table -->
@endsection



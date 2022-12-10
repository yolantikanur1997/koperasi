@extends('layout.main')

@section('container')
<!-- table -->
<div class="card">
  <div class="card-header" style="width:100%;">
  Edit Data Faktur
  </div>
  @if(session()->has('Sukses'))
  <div class="alert alert-success mt-2 mr-3 ml-3" role="alert">
  {{ session('Sukses') }}
</div>
  @endif
  <div class="card-body">
  <div class="form-group">
      <form method="POST" action="{{ url('faktur/update', $faktur->id ) }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label>PIC</label>
        <select name="id_pengguna" id="id_pengguna" class="form-control select2">
      <option value="">Pilih</option>
        @foreach($pengguna as $p)
        <option value="{{ $p->id }}" {{ $p->id == $faktur->id_pengguna  ? 'selected' : '' }}>{{ $p->nama }}</option>
        @endforeach
          </select>
        </div>
      <div class="form-group">
        <label>Tagihan</label>
        @foreach($tagihan as $t)
        <input type="text" class="form-control" value="{{ $t->nomor_tagihan }}" disabled>
        @endforeach
        </div>
        <div class="form-group">
          <label>Kode Faktur</label>
          <select class="form-control select2" name="kode_faktur" id="kode_faktur">
          <option value="010"{{ $faktur->kode_faktur=="010" ? 'selected' : ''}}>010</option>
          <option value="020"{{ $faktur->kode_faktur=="020" ? 'selected' : ''}}>020</option>
          <option value="030"{{ $faktur->kode_faktur=="103" ? 'selected' : ''}}>103</option>
          <option value="040"{{ $faktur->kode_faktur=="103" ? 'selected' : ''}}>103</option>
          <option value="050"{{ $faktur->kode_faktur=="050" ? 'selected' : ''}}>050</option>
          <option value="060"{{ $faktur->kode_faktur=="060" ? 'selected' : ''}}>060</option>
          <option value="070"{{ $faktur->kode_faktur=="070" ? 'selected' : ''}}>070</option>
          <option value="080"{{ $faktur->kode_faktur=="080" ? 'selected' : ''}}>080</option>
          <option value="090"{{ $faktur->kode_faktur=="090" ? 'selected' : ''}}>090</option>
        </select>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $faktur->tanggal }}">
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control select2" name="status" id="status">
          <option value="Proses"{{ $faktur->status=="Proses" ? 'selected' : ''}}>Proses</option>
          <option value="Disetujui"{{ $faktur->status=="Disetujui" ? 'selected' : ''}}>Disetujui</option>
          <option value="Closed"{{ $faktur->status=="Closed" ? 'selected' : ''}}>Closed</option>
        </select>
        </div>

 

      </div>
      <button class="btn btn-primary" type="submit">Ubah</button>

	</form>

  </div>



<!-- table -->
@endsection



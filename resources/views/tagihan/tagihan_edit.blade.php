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
      <form method="POST" action="{{ url('tagihan/update', $tagihan->id ) }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label>PIC</label>
        <select name="id_pengguna" id="id_pengguna" class="form-control select2">
      <option value="">Pilih</option>
        @foreach($pengguna as $p)
        <option value="{{ $p->id }}" {{ $p->id == $tagihan->id_pengguna  ? 'selected' : '' }}>{{ $p->nama }}</option>
        @endforeach
          </select>
        </div>
      <div class="form-group">
        <label>Tujuan</label>
        <select name="id_tujuan" id="id_tujuan" class="form-control select2">
      <option value="">Pilih</option>
        @foreach($tujuan as $t)
        <option value="{{ $t->id }}" {{ $t->id == $tagihan->id_tujuan  ? 'selected' : '' }}>{{ $t->nama }}</option>
        @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $tagihan->tanggal }}">
        </div>
        <div class="form-group">
          <label>Uraian</label>
          <textarea class="form-control" name="uraian" id="uraian">{{ $tagihan->uraian }}</textarea>
        </div>
        <div class="form-group">
          <label>Nilai Tagihan</label>
          <input type="text" class="form-control" id="nilai_tagihan" name="nilai_tagihan" value="{{ $tagihan->nilai_tagihan }}">
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control select2" name="status" id="status">
          <option value="Proses"{{ $tagihan->status=="Proses" ? 'selected' : ''}}>Proses</option>
          <option value="Disetujui"{{ $tagihan->status=="Disetujui" ? 'selected' : ''}}>Disetujui</option>
          <option value="Closed"{{ $tagihan->status=="Closed" ? 'selected' : ''}}>Closed</option>
        </select>
        </div>

 

      </div>
      <button class="btn btn-primary" type="submit">Ubah</button>

	</form>

  </div>



<!-- table -->
@endsection



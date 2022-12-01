@extends('layout.main')

@section('container')
<!-- table -->
<div class="card">
  <div class="card-header" style="width:100%;">
  {{ $title }}
  </div>
  <div class="card-body">
  <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
  <form action="/tujuan/cari" method="GET">
      <input type="text" class="form-control" name="cari" id="cari" placeholder="Masukan Nama Tujuan" value="{{ old('cari') }}" style="width: 100%;">
        </div>
      <div class="col-sm-2">
      <button type="submit" class="btn btn-outline-info"><i class="fa-solid fa-magnifying-glass"></i></button>    
        </div>
	</form>
  <div class="col-sm-4">
  <a href="/tujuan/form"><button type="button" class="btn btn-outline-primary float-right" ><i class="fa-solid fa-plus"></i></button>  </a>  
      <a href="/tujuan"><button class="btn btn-outline-success float-right"><i class="fa-solid fa-arrows-rotate"></i></button>    </a>
        </div>
  </div>
</div>
  <table class="table table-bordered table-striped text-center">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Penanggung Jawab</th>
    <th>Aksi</th>
  </tr>

  @foreach($tujuan as $index => $k) 
  <tr>
    <th>{{ $tujuan->firstItem() + $index }}</th>
    <td>{{ $k->nama }}</td>
    <td>{{ $k->email }}</td>
    <td>{{ $k->penanggung_jawab }}</td>
    <td>
        <a href="/tujuan/edit/{{ $k->id }}" title="Edit"><button class="badge bg-success border-0 pt-2 pb-2 pl-2 pr-2">
        <i class="fa-solid fa-pencil" style="color:white"></i></button></a>
        <a href="/tujuan/hapus/{{ $k->id }}" title="Hapus"><button class="badge bg-danger border-0 pt-2 pb-2 pl-2 pr-2" onclick="return confirm('Yakin ingin menghapus data?')">
        <i class="fa-solid fa-circle-minus" style="color:white"></i></button></a>
    </td>
  </tr>
  @endforeach
</table>  
        Page: {{ $tujuan->currentPage() }}<br>
        Jumlah Data: {{ $tujuan->total() }}<br>
        <!-- Data perhalaman: {{ $tujuan->perPage() }}<br> -->
        <br>
        {{ $tujuan->links() }}
  </div>
</div>

@endsection



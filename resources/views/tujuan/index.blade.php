@extends('layout.main')

@section('container')
<!-- table -->
<div class="card">
  <div class="card-header" style="width:100%;">
  {{ $title }}
  </div>
  @if(session()->has('Hapus'))
  <div class="alert alert-danger mt-2 mr-3 ml-3" role="alert">
  {{ session('Hapus') }}
</div>
  @endif
  @if(session()->has('Edit'))
  <div class="alert alert-warning mt-2 mr-3 ml-3" role="alert">
  {{ session('Edit') }}
</div>
  @endif
  <div class="card-body">
  <div class="form-group">
      <div class="row">
        <div class="col-sm-6">
  <form action="/tujuan/cari" method="GET">
      <input type="text" class="form-control" name="cari" id="cari" placeholder="Cari" value="{{ old('cari') }}" style="width: 100%;">
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
    <th>Telepon</th>
    <th>Penanggung Jawab</th>
    <th>Aksi</th>
  </tr>

  @foreach($tujuan as $index => $k) 
  <tr>
    <th>{{ $tujuan->firstItem() + $index }}</th>
    <td>{{ $k->nama }}</td>
    <td>{{ $k->email }}</td>
    <td>{{ $k->telepon }}</td>
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
<div class="row">
  <div class="col-sm-6" style="float: left;">
  Page: {{ $tujuan->currentPage() }}<br>
        Jumlah Data: {{ $tujuan->total() }}<br>
  </div>
    <div class="col-sm-6" style="display: flex; justify-content: flex-end">
  <div>{{ $tujuan->links() }}</div>
</div>

</div>
        
     
  </div>
</div>

@endsection



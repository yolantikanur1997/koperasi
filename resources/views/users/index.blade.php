@extends('layout.main')

@section('container')

<div class="card">
  <h5 class="card-header">{{$title}}</h5>
  <div class="card-body">
  <table class="table table-bordered table-striped text-center yajra-datatable">
<thead>
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Aksi</th>
    <tr>
</thead>
<tbody>

</tbody>

    </table>
  </div>
</div>




@endsection
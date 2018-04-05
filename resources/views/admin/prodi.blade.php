
@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="container">
	<h3 class="mt-4"><i class="fa fa-graduation-cap"></i> Program Studi</h3>
	<div class="card mt-4">
		<div class="card-header"><b>Tambah Prodi</b></div>
		<div class="card-body">
			@if (Session::has('error'))
				<div class="alert alert-danger">
					<i class="fa fa-exclamation-triangle"></i>  {!! Session::get('error') !!}
				</div>
			@endif

			@if (Session::has('success'))
				<div class="alert alert-success">
					<i class="fa fa-check"></i><i class="fa fa-graduation-cap"></i>  {!! Session::get('success') !!}
				</div>
			@endif


			<form action="{{ route('admin.prodi.post') }}" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-4 col-12">
						<label for="nama">Program Studi</label>
						<input type="text" name="nama" class="form-control" id="nama">
					</div>
					<div class="col-md-4 col-12">
						<label for="fakultas">Fakultas</label>
						<select name="fakultas" id="fakultas" class="form-control">
							<option value="FT">Fakultas Teknik</option>
							<option value="FMIPA">Fakultas Matematika dan IPA</option>
							<option value="FIS">Fakultas Ilmu Sosial</option>
							<option value="FIP">Fakultas Ilmu Pendidikan</option>
							<option value="FBS">Fakultas Bahasa dan Seni</option>
							<option value="FE">Fakultas Ekonomi</option>
							<option value="FIK">Fakultas Ilmu Keolahragaan</option>
							<option value="PPs">Pascasarjana</option>
						</select>
					</div>
					<div class="col-md-4 col-12 pt-4">
						<button type="submit" class="btn btn-primary btn-block">Submit Prodi</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card mt-4">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Program Studi</th>
						<th>Fakultas</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($prodi as $item)
						<tr>
							<td>{{ $item->nama }}</td>
							<td>{{ $item->fakultas }}</td>
							<td><a href="" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a><a href="" class="btn btn-danger	"><i class="fa fa-trash"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>	
	
</div>
@endsection

@push('js')
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
		    $('.table').DataTable();
		});
	</script>
@endpush
@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="container-fluid" id="app">
		<h3 class="mt-3">Pengguna Terblokir</h3>

		<a href="{{ route('admin.report.blocked.user') }}" class="btn btn-primary"><i class="fa fa-times"></i> <i class="fa fa-user"></i> Pengguna terblokir</a>
		<a href="{{ route('admin.report.blocked.karya') }}" class="btn btn-success"><i class="fa fa-times"></i> <i class="fa fa-file-alt"></i> Karya terhapus</a>
		
	</div>

@endsection

@push('js')
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready( function () {
		    $('.table').DataTable();
		});

	</script>
@endpush
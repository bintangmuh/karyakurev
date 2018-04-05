@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
	<div class="container-fluid">
		<h3 class="mt-3">Laporan Masuk</h3>
		<div class="card pt-2">
			<div class="card-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>Karya</th>
							<th>Pemilik</th>
							<th>Alasan</th>
							<th>Email Pelapor</th>
							<th>Tanggal</th>
						</tr>
					</thead>
					<tbody>
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
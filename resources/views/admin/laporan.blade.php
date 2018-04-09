@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
	<div class="container-fluid" id="app">
		<h3 class="mt-3">Laporan Masuk</h3>
		<div class="card mt-2">
			@if (Session::has('success'))
			<div class="alert alert-success">
				<i class="fa fa-check"></i>{!! Session::get('success') !!}
			</div>
			@endif
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
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($reports as $report)
							<tr>
								<td>{{ $report->id }}</td>
								<td>{{ $report->karya->nama }}</td>
								<td>{{ $report->karya->user->name }} <br> (<a href="mailto:{{ $report->karya->user->email }}">{{ $report->karya->user->email }}</a>)</td>
								<td>{{ $report->alasan }}</td>
								<td>{{ $report->pelapor }}</td>
								<td>{{ $report->created_at->format('d M Y - H:i') }}</td>
								<td class="text-right">
									<a href="{{ route('admin.report.delete', ['report' => $report]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		{{-- Modal Delete Report --}}
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Peringatan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
						<a class="btn btn-danger" :href="deletepath"><i class="fa fa-trash"></i> hapus</a>
					</div>
				</div>
			</div>
		</div>
		{{-- Modal Delete User --}}
		{{-- Modal Delete Report --}}
	</div>

@endsection

@push('js')
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
		    $('.table').DataTable();
		});

		var app = new Vue({
			el: '#app',
			data: {
				basepath: '',
				deletepath: '',
			},
		});
	</script>
@endpush
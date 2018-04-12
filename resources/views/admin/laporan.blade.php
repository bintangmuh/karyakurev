@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
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
			<div class="pt-4 pb-4">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Karya</th>
							<th>Pemilik</th>
							<th>Alasan</th>
							<th>Email Pelapor</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($reports as $report)
							<tr class="{{ ($report->karya->deleted_at == null && $report->karya->user->deleted_at == null) ? '' : 'table-danger' }}">
								<td>{{ $report->id }}</td>
								<td>
									{{ $report->karya->nama }} 
									<br>
									<br>
									@if ($report->karya->deleted_at == null )
										<button class="btn btn-danger" data-toggle="modal" data-target="#moderationModal" @click="deletekarya('{{ $report->karya->id}}')"><i class="fa fa-times"></i> <i class="fa fa-file-alt"></i> Block Karya</button>
									@elseif($report->karya->user->deleted_at == null)
										<a href="{{ route('admin.report.restore.karya', ['karya' => $report->karya->id]) }}" class="btn btn-primary"> Kembalikan karya</a>
									@endif
								</td>
								<td>
									{{ $report->karya->user->name }} <br> (<a href="mailto:{{ $report->karya->user->email }}">{{ $report->karya->user->email }}</a>)
									<br>
									@if ($report->karya->user->deleted_at == null)
										<button class="btn btn-danger" data-toggle="modal" data-target="#blockUser" @click="deleteuser('{{ $report->karya->user->id}}')"><i class="fa fa-times"></i> <i class="fa fa-user"></i> Block user</button>
									@else
										<a href="{{ route('admin.report.restore.user', ['karya' => $report->karya->user_id]) }}" class="btn btn-primary"> Kembalikan user</a>
									@endif
								</td>
								<td>{{ $report->alasan }}</td>
								<td>{{ $report->pelapor }}</td>
								<td>{{ $report->created_at->format('d M Y - H:i') }}</td>
								<td>
									<strong>{{ ($report->karya->deleted_at == null && $report->karya->user->deleted_at == null) ? 'None' : 'Blocked' }}</strong>
								</td>
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
						<h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Peringatan</h5>
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
		<div class="modal fade" id="moderationModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Moderasi Karya</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12 mb-3">
								Delete Karya ini?
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
						<a :href="deletekaryapath" class="btn btn-primary">Ya</a>
					</div>
				</div>
			</div>
		</div>
		{{-- Modal Delete user --}}
		<div class="modal fade" id="blockUser" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Peringatan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah anda ingin block user ini?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
						<a class="btn btn-danger" :href="deleteuserpath"><i class="fa fa-trash"></i> hapus</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('js')
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready( function () {
		    $('.table').DataTable();
		});

		var app = new Vue({
			el: '#app',
			data: {
				basepath: '{{ route('admin.report')}}',
				deletepath: '',
				deletekaryapath: '',
				deleteuserpath: ''
			},
			methods: {
				deletekarya: function(id) {
					this.deletekaryapath = this.basepath + '/karya/' +id+ '/delete';
				},
				deleteuser: function(id) {
					this.deleteuserpath = this.basepath + '/user/' +id+ '/delete';
				}
			}
		});
	</script>
@endpush
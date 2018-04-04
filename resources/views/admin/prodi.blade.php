
@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush
@section('content')
<div class="container">
	<h3 class="mt-4"><i class="fa fa-graduation-cap"></i> Program Studi</h3>
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

@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush
@section('content')
<div class="container">
	<h3 class="mt-4 pb-2"><i class="fa fa-tag"></i> Tag yang tersedia</h3>
	<input type="text" class="form-control">
	<a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Tag Baru</a>
	<div class="card mt-2">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>id</th>
						<th>Tags</th>
						<th>Jumlah</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tags as $tag)
						<tr>
							<td>{{ $tag->id }}</td>
							<td>{{ $tag->tag }}</td>
							<td>{{ $tag->karya->count() }}</td>
							<td>
								<a href="{{ route('explore.tags', ['tags' => $tag]) }}" class="btn btn-success" target="__blank"><i class="fa fa-eye"></i></a>
								<a href="{{ route('explore.tags', ['tags' => $tag]) }}" class="btn btn-danger" target="__blank"><i class="fa fa-trash"></i></a>
							</td>
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
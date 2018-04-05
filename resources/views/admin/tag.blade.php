
@extends('layouts.admin')

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush
@section('content')
<div class="container">
	<h3 class="mt-4 pb-2"><i class="fa fa-tag"></i> Tag yang tersedia</h3>
	<form action="{{ route('admin.tags.post') }}" method="POST" class="form">
		{{ csrf_field() }}
		@if (Session::has('error'))
			<div class="alert alert-danger mt-3">
				<i class="fa fa-exclamation-triangle"></i>  {!! Session::get('error') !!}
			</div>
		@endif
		<div class="row">
			<div class="col-md-4 col-12">
				<input type="text" name="tags" class="form-control"  placeholder="Tag baru .. ">
			</div>
			<div class="col-md-2 col-12">
				<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-tags"></i> Submit</button>
			</div>
		</div>
	</form>

	@if (Session::has('success'))
		<div class="alert alert-success mt-3">
			<i class="fa fa-check"></i>  {!! Session::get('success') !!}
		</div>
	@endif

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
								<a href="{{ route('admin.tags.delete', ['tags' => $tag]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
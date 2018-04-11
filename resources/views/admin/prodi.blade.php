@extends('layouts.admin')
@push('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="container" id="app">
	<h3 class="mt-4"><i class="fa fa-graduation-cap"></i> Program Studi</h3>
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
	<div class="card mt-4">
		<div class="card-header"><b>Tambah Prodi</b></div>
		<div class="card-body">
			
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
		<div class="pt-4 pb-4">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Program Studi</th>
						<th>Fakultas</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(item, index) in prodi" >
						<td>@{{item.id}}</td>
						<td>@{{item.nama}}</td>
						<td>@{{item.fakultas}}</td>
						<td class="text-center">
							<a class="btn btn-primary text-white" data-toggle="modal" data-target="#editModal" @click="editModal(index)"><i class="fa fa-pencil-alt"></i></a>
							<a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal" @click="deleteModal(index)"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	{{-- Modal Edit --}}
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Menyunting program studi - @{{ nama }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form :action="editpath" method="POST">
				{{ csrf_field() }}
				<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama Program Studi : </label>
							<input type="text" class="form-control" id="nama" name="nama" v-model="nama">
						</div>
						<div class="form-group">
							<label for="fakultas">Fakultas</label>
							<select name="fakultas" id="fakultas" class="form-control" v-model="fakultas">
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
						<div class="form-group">
							
						</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> Peringatan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Apakah anda yakin menghapus - <b>@{{ nama }}</b> dari <b>@{{ fakultas }}</b>?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
					<a class="btn btn-danger" :href="deletepath"><i class="fa fa-trash"></i> hapus</a>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Delete modal --}}
@endsection
@push('js')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready( function () {
	    $('.table').DataTable();
	});
</script>
<script>
	var app = new Vue({
		data: {
			id: '',
			prodi: {!! $prodi !!},
			basepath: '{{ route('admin.prodi') }}',
			editpath: '{{ route('admin.prodi') }}',
			deletepath: '',
			nama: 'Pendidikan Teknik Akuntansi',
			fakultas: 'FE'
		},
		methods: {
			editModal: function(key) {
				this.id = this.prodi[key].id;
				this.nama = this.prodi[key].nama;
				this.fakultas = this.prodi[key].fakultas;
				this.editpath = this.basepath + '/'+ this.id + '/edit';
			},
			deleteModal: function(key) {
				this.id = this.prodi[key].id;
				this.nama = this.prodi[key].nama;
				this.fakultas = this.prodi[key].fakultas;
				this.deletepath = this.basepath + '/'+ this.id + '/delete';
			}
		}
	}).$mount('#app');

	
</script>
@endpush
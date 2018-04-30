@extends('layouts.admin')


@section('content')
	<div class="container" id="app">
		<div class="row">
			<div class="col-12">
				<h3 class="mt-3 mb-4"><i class="fa fa-user"></i> Administrator</h3>
				<div class="row">
					<div class="col-md-6 col-12">
						<button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#addAdmin" 
				  	 aria-expanded="false" aria-controls="addAdmin"><i class="fa fa-plus"></i> Tambah Admin</button>
						<div class="collapse {{ $errors->any() ? 'show' : ''}}" id="addAdmin">
						  <div class="card card-body">
						    <form action="{{ route('admin.user.post') }}" method="POST">
						    	{{ csrf_field() }}
						    	<div class="form-group">
						    		<label for="">Username (untuk login)</label>
						    		<input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid ' : '' }}" name="username" value="{{ old('username') }}">
						    		<span class="invalid-feedback"><strong>{{ $errors->first('username') }}</strong></span>
						    	</div>
						    	<div class="form-group">
						    		<label for="">Nama</label>
						    		<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid ' : '' }}" name="name" value="{{ old('nama') }}">
						    		<span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
						    	</div>
						    	<div class="form-group">
						    		<label for="">Email</label>
						    		<input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid ' : '' }}" name="email" value="{{ old('email') }}">
						    		<span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
						    	</div>
						    	<div class="form-group">
						    		<label for="">Password</label>
						    		<input type="Password" class="form-control {{ $errors->has('password') ? ' is-invalid ' : '' }}" name="password">
						    		<span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
						    	</div>
						    	<div class="form-group">
						    		<button class="btn btn-primary" type="submit">Tambah Admin</button>
						    		<button class="btn btn-secondary" type="reset">Batal</button>
						    	</div>
						    </form>
						  </div>
						</div>
					</div>
				</div>
				<div class="card">
					@if (Session::has('error'))
						<div class="alert alert-danger">
							<i class="fa fa-exclamation-triangle"></i>  {!! Session::get('error') !!}
						</div>
					@endif
					@if (Session::has('success'))
						<div class="alert alert-success">
							<i class="fa fa-check"></i>  {!! Session::get('success') !!}
						</div>
					@endif
					<div class="card-body">
						<table class="table table-hover table-striped">
							<tr>
								<th>Username</th>
								<th>Nama</th>
								<th>Email</th>
								<th>aksi</th>
							</tr>
							@foreach ($admin as $item)
								<tr>
									<td>{{ $item->username }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->email }}</td>
									<td>
										<div class="btn btn-info" data-toggle="modal" data-target="#editModal" @click="editPass('{{ $item->id}}', '{{ $item->name}}')" >Edit Password</div>
										<div class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" @click="deleteadmin('{{ $item->id}}', '{{ $item->name}}')">Hapus</div>
									</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>



		{{-- Modal Edit --}}
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Menyunting administrator - @{{ nama }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form :action="editpath" method="POST">
					{{ csrf_field() }}
					<div class="modal-body">
						<label for="">Password Baru untuk <b> @{{ nama }}</b>:</label>
						<input type="password" name="newpassword" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
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
						<p>Apakah anda yakin menghapus - <b>@{{ nama }}</b> ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
						<a class="btn btn-danger" :href="deletepath"><i class="fa fa-trash"></i> hapus</a>
					</div>
				</div>
			</div>
		</div>
	{{-- End container --}}
	</div>


@endsection

@push('js')
	<script>
		var app = new Vue({
			el: '#app',
			data: {
				id: 0,
				nama: '',
				editpath: '',
				deletepath: '',
				basepath: '{{ route('admin.user') }}',
			},
			methods: {
				editPass: function(id, nama) {
					this.nama = nama;
					this.id = id;
					this.editpath = this.basepath + '/' + id + '/edit';
				},
				deleteadmin: function(id, nama) {
					this.nama = nama;
					this.id = id;
					this.deletepath = this.basepath + '/' + id + '/delete';
				}
			}
		});
	</script>
@endpush
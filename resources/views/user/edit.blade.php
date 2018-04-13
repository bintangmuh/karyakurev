@extends('layouts.user')
@section('title', 'Sunting Profil - ')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush
@section('body')
<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-md-8">
			@if (Session::has('success'))
			<div class="alert alert-success">
				<b>Berhasil</b><br>
				{{ Session::get('success') }}
			</div>
			@endif
			
			@if (Session::has('error-password'))
			<div class="alert alert-danger">
				<b>Gagal</b><br>
				{{ Session::get('error-password') }}
			</div>
			@endif
			<div class="card">
				<div class="card-body">
					<form action="{{ route('user.postedit') }}" method="POST">
						<h4><i class="fa fa-pencil-alt"></i> Sunting Profil</h4>
						<hr>
						{{ csrf_field() }}
						<div class="form-group row">
							<label for="nama" class="col-md-3">Nama</label>
							<div class="col-md-9">
								<input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid ' : '' }}" id="nama" name="name" value="{{ $user->name }}">
								@if ($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="nim" class="col-md-3">NIM</label>
							<div class="col-md-9">
								<input type="text" class="form-control  {{ $errors->has('nim') ? ' is-invalid ' : '' }}" id="nim" name="nim" value="{{ $user->nim }}">
								@if ($errors->has('nim'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('nim') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="prodi" class="col-md-3">Program Studi</label>
							<div class="col-md-9">
								<select name="prodi" class="form-control" id="prodi">
									@foreach ($prodiList as $prodi)
									<option value="{{ $prodi->id }}" {{ $prodi->id == $user->prodi_id ? 'selected' : '' }}>{{ $prodi->nama }}</option>
									@endforeach
								</select>
								@if ($errors->has('prodi'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('prodi') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-3">Email</label>
							<div class="col-md-9">
								<input type="text" class="form-control  {{ $errors->has('email') ? ' is-invalid ' : '' }}" id="email" name="email" value="{{ $user->email }}">
								@if ($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<button class="btn btn-primary"><i class="fa fa-save"></i>  Simpan Perubahan</button>
					</form>
				</div>
			</div>
			<div class="card mt-4 mb-4">
				<div class="card-body">
					<b><i class="fa fa-key"></i> Ubah Password</b>
					<hr>
					<form action="{{ route('user.changepass') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group row">
							<label for="password" class="col-md-3 label-control">Password Baru : </label>
							<div class="col-md-9">
								<input type="password" name="password" class="form-control" id="password">
							</div>
						</div>
						<div class="form-group row">
							<label for="retype" class="col-md-3 label-control">Tulis ulang Password Baru : </label>
							<div class="col-md-9">
								<input type="password" name="password_confirmation" class="form-control" id="retype">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<button type="submit" class="btn btn-primary btn-block">Simpan Sandi Baru</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="uploadsection" class="col-md-3">
			<div class="card">
				<div class="card-body">
					<b>Gambar Profil</b>
					<hr>
					@if (Session::has('error-photo'))
					<div class="alert alert-danger">
						<b>Gagal</b><br>
						{{ Session::get('error-photo') }}
						{{ $errors }}
					</div>
					@endif
					<img src="{{ $user->profil_img == NULL ? asset('img/noprofilimage.png') : asset($user->profil_img . '-100.jpg') }}"  class="rounded-circle mb-3" width="100%" alt="">
					<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#form-upload"><i class="fa fa-pencil-alt"></i> Ubah Gambar Profil</button>
				</div>
			</div>
		</div>
	</div>
	{{-- Modal upload --}}
	<div class="modal fade" id="form-upload" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form action="{{ route('user.upload') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-image"></i> Upload Foto Profil</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label for="Foto">Pilih foto profil : </label>
						<input type="file" name="photo" required>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Unggah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('#prodi').select2();
	});
</script>
@endpush
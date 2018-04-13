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
					<form action="">
						<div class="form-group row">
							<label for="password" class="col-md-3 label-control">Password Baru : </label>
							<div class="col-md-9">
								<input type="password" name="password" class="form-control" id="password">
							</div>
						</div>
						<div class="form-group row">
							<label for="retype" class="col-md-3 label-control">Tulis ulang Password Baru : </label>
							<div class="col-md-9">
								<input type="password" name="password" class="form-control" id="retype">
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
					<img src="{{ asset('img/noprofilimage.png') }}"  class="rounded-circle mb-3" width="100%" alt="">
					<button class="btn btn-primary btn-block"><i class="fa fa-pencil-alt"></i> Ubah Gambar Profil</button>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			
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
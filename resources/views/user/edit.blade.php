@extends('layouts.user')

@section('title', 'Sunting Profil - ')

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
								<input type="text" class="form-control  {{ $errors->has('prodi') ? ' is-invalid ' : '' }}" id="prodi" name="prodi" value="{{ $user->prodi }}">
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
		</div>

		<div id="uploadsection" class="col-md-3">
			<div class="card">
				<div class="card-body">
					<b>Gambar Profil</b>
					<hr>
					<img src="{{ asset('img/noprofilimage.png') }}"  class="rounded-circle" width="100%" alt="">
					<form action="">
						<label class="btn btn-primary btn-block custom-file-form">
							<input type="file" name="profilimg">
							<i class="fa fa-upload"></i> Unggah Gambar
						</label>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
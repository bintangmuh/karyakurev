@extends('layouts.user')

@section('title', 'Tambah Karya - ')

@section('body')
<div class="d-flex justify-content-center">
	<div class="col-md-8 ">
		<div class="card">
			<div class="card-body">
				<h4>Tambah Karya Baru</h4>
				<div class="row">
					<div class="col">
						<form action="{{ route('karya.buat') }}" method="POST">
							 {{ csrf_field() }}
							<div class="form-group">
								<label for="nama">Judul Karya: </label>
								<input type="text" name="nama" class="form-control {{ $errors->has('nama') ? ' is-invalid ' : '' }}" id="nama">
								@if ($errors->has('nama'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="deskripsi">Deskripsi Singkat Karya: </label>
								<textarea class="form-control" rows="7" name="deskripsi" id="deskripsi"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Buat Karya Baru">
							</div>
						</form>
					</div>			
				</div>
			</div>		
		</div>
	</div>
</div>		
@endsection


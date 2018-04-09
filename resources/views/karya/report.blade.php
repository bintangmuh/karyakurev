@extends('layouts.user')

@section('body')
	<div class="container">
		<div class="row justify-content-center pt-4">
			<div class="col-12 col-md-6">
				<div class="card mt-2">
					<div class="card-header">
						<h4>Laporkan karya ini ke administrator</h4>
					</div>
					@if (Session::has('success'))
						<div class="alert alert-success">
							<i class="fa fa-check"></i>  {!! Session::get('success') !!}
						</div>
					@endif
					<div class="card-body">
						<form action="{{ route('report.post', ['karya' => $karya]) }}" method="POST">
							{{ csrf_field() }}
							<div class="media mt-1 mb-3">
							  <img class="mr-3" src="{{ $karya->img_thumb == null ? asset('img/noimage.png') : asset($karya->img_thumb)}}" style="max-width: 64px;" alt="Thumbnail">
							  <div class="media-body">
							    <h5 class="mt-0">{{ $karya->nama }}</h5>
							    <p>Oleh: {{ $karya->user->name }}</p>
							  </div>
							</div>

							<div class="form-group">
								<label for="alasan"><b>Kenapa karya ini harus dilaporkan?</b></label>
								<textarea name="alasan" id="alasan" class="form-control {{ $errors->has('alasan') ? ' is-invalid ' : '' }}" rows="4">{{old('alasan')}}</textarea>
								<span class="invalid-feedback"><strong>{{ $errors->first('alasan') }}</strong></span>
							</div>
							<div class="form-group">
								<label for="email"><b>Email Pelapor</b></label>
								<input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid ' : '' }}" value="{{ (Auth::check()) ? Auth::user()->email : ''  }}">
								<span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Laporkan</button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>	
	</div>
@endsection
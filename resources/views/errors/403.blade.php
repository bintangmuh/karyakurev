@extends('layouts.user')

@section('title', 'Maaf! Layanan tidak tersedia')

@section('body')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body text-center">
						<h1>403 - forbidden</h1> 
						<p>Anda tidak memliki akses untuk memperbarui data pada halaman ini.</p>
						<a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-home"></i> Ke Beranda</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
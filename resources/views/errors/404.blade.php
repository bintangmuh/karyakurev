@extends('layouts.user')

@section('title', 'Maaf! Layanan tidak tersedia')

@section('body')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body text-center">
						<h1>404 - Halaman tidak ditemukan</h1> 
						<p>Mohon maaf, hasil yang anda inginkan tidak ada di website ini</p>
						<a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-home"></i> Ke Beranda</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
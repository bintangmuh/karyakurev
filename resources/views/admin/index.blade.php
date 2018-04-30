@extends('layouts.admin')
@section('content')
<ol class="breadcrumb">
	<li>Dashboard</li>
</ol>
<div class="container">
	<div class="row">

		<div class="col-sm-6 col-lg-3">
			<div class="card text-white bg-blue">
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-3 mr-3">
								<i class="fa fa-file fa-3x"></i>
							</div>
							<div class="col-8">
								<h4 class="mb-0">{{ App\Karya::all()->count() }}</h4>
								<p>Karya Masuk</p>
							</div>
						</div>
					</div>
			</div>
		</div>

		<div class="col-sm-6 col-lg-3">
			<div class="card text-white bg-teal">
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-3 mr-3">
							<i class="fa fa-graduation-cap fa-3x"></i>
						</div>
						<div class="col-8">
							<h4 class="mb-0">{{ App\Prodi::all()->count() }}</h4>
							<p>Program Studi</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-lg-3">
			<div class="card text-white bg-yellow">
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-3 mr-3">
							<i class="fa fa-graduation-cap fa-3x"></i>
						</div>
						<div class="col-8">
							<h4 class="mb-0">{{ App\User::all()->count() }}</h4>
							<p>Members</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-lg-3">
			<div class="card text-white bg-red">
				<div class="card-body pb-0">
					<div class="row">
						<div class="col-3 mr-3">
							<i class="fa fa-inbox fa-3x"></i>
						</div>
						<div class="col-8">
							<h3 class="mb-0">{{ App\Report::all()->count() }}</h3>
							<p>Laporan Masuk</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"><strong>Karya Terbaru</strong></div>
				<div class="card-body  pt-0 pb-0 pr-0 pl-0">
					@php
						$karyas = App\Karya::orderBy('created_at', 'DESC')->limit(5)->get();
					@endphp
					<ul class="list-group">
					@if ($karyas->count() == 0)
						<li class="list-group-item">Tidak ada Karya</li>
					@endif
					@foreach ($karyas as $karya)
						<li class="list-group-item"><a href="{{ route('karya.tampil', ['karya' => $karya]) }}">{{ $karya->nama }}</a></li>
					@endforeach
					</ul>
				</div>
				<div class="card-footer text-right">
					<a href="{{ route('explore') }}" class="btn btn-primary">Lihat Semua</a>
				</div>
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<strong>Laporan Masuk</strong>
				</div>
				<div class="card-body  pt-0 pb-0 pr-0 pl-0">
					@php
						$laporan = App\Report::orderBy('created_at', 'DESC')->limit(5)->get();
					@endphp
					<ul class="list-group">
					@if ($laporan->count() == 0)
						<li class="list-group-item">Tidak ada Laporan</li>
					@endif
					@foreach ($laporan as $lapor)
						<li class="list-group-item">{{ $lapor->alasan }} - {{ $lapor->created_at->format('d M Y h:i') }}</li>
					@endforeach
					</ul>
				</div>
				<div class="card-footer text-right">
					<a href="{{ route('admin.report') }}" class="btn btn-primary">Lihat Semua</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
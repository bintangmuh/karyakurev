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
</div>
</div>
@endsection
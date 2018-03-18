@extends('layouts.user')

@section('title', 'Profil - ')

@section('body')
<div class="container">
	<div class="row ">
		
	</div>
	<div class="col-lg-8">
		<div class="col-md-4 col-lg-3 align-self-stretch profiler" >
			{{ $user->name }}
			
			{{ $user->nim }}
			{{ $user->prodi }}

			@if (Auth::user()->id == $user->id)
				<a href="{{ route('user.edit') }}" class="btn btn-info"><i class="fa fa-pencil-alt"></i> Sunting Profil</a>
			@endif
		</div>
		<div class="row justify-content-around">
			@foreach (	$user->karya as $karya)
				<div class="col-4 grid-gallery">
					<img src="https://dummyimage.com/400x400/48c8e8/952be6.jpg&text={{ $karya->nama }}" class="img-fluid" alt="">
					<span class="title">{{ $karya->nama }}</span>	
				</div>
			@endforeach	
			
		</div>
	</div>	
</div>
@endsection
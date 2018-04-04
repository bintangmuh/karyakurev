@extends('layouts.user')

@section('title', 'Profil - ')

@section('body')
<div class="container">
	<div class="row d-flex justify-content-center">
		
		<div class="col-lg-8 card">
			<div class="col-12 pt-3 pb-3 media profil-box">
				@if ($user->profilimg == NULL)
					<img src="{{ asset('img/noprofilimage.png') }}"  class="rounded-circle mr-3" alt=""><br>
				@endif	
				<div class="media-body">
					<span class="line nama">{{ $user->name }} 
					@if (Auth::user()->id == $user->id)
						<a href="{{ route('user.edit') }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i> Sunting Profil</a>
					@endif</span>
					<span class="line nim">{{ $user->nim }}</span>
					<span class="line prodi">{{ $user->prodi->nama }}</span>
				</div>	
				
			</div>
			<div class="col-md-4 col-lg-3 align-self-stretch profiler" >
				

				
			</div>
			<div class="row">
				@foreach ($user->karya as $karya)
					<div class="col-lg-3 col-md-4 col-xs-6">
						<img src="https://dummyimage.com/400x400/48c8e8/952be6.jpg&text={{ $karya->nama }}" class="img-fluid" alt="">
						<span class="title">{{ $karya->nama }}</span>	
					</div>
				@endforeach	
				
			</div>
		</div>	
	</div>
</div>
@endsection
@extends('layouts.user')

@section('title')
	{{ $karya->nama }} - 
@endsection

@section('content')
	@if (Auth::check())
		@include('components.navbar')
	@endif
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-8 col-lg-9">	
								<h3>{{$karya->nama}}</h3>
								<b>Galeri</b>
								<ul class="gallery">
									@for ($i = 1; $i  < 5; $i++)
										<li>
											<img src="https://dummyimage.com/600x400/48c8e8/952be6.jpg&text=Sample+{{$i}}" alt="">
										</li>
									@endfor	
								</ul>
								<b>Deskripsi</b><br>
								{{ $karya->deskripsi }}
							</div>
							<div class="col-md-4 col-lg-3 pt-3 pb-3 profiler profil">
								@if ($karya->user->profilimg == NULL)
									<img src="{{ asset('img/noprofilimage.png') }}"  class="rounded-circle mb-3" alt=""><br>
								@endif	
								<div>
									<span class="line nama">{{ $karya->user->name }}</span>
									<span class="line nim">{{ $karya->user->nim }}</span>
									<span class="line prodi">{{ $karya->user->prodi }}</span>
								</div>	
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	  Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	      </button>
		  <img class="img-fluid" src="https://dummyimage.com/600x400/48c8e8/952be6.jpg&text=Sample+{{$i}}" alt="">
	      <button type="button" class="modal-nav" data-dismiss="modal" aria-label="Sebelumnya">
	          <span aria-hidden="true">&times;</span>
	      </button>
	      <button type="button" class="modal-nav" data-dismiss="modal" aria-label="Selanjutnya">
	          <span aria-hidden="true">&times;</span>
	      </button>
	  </div>
	</div>

@endsection
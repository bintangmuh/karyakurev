@extends('layouts.user')

@section('title')
	{{ $karya->nama }} - 
@endsection

@push('css')
	@component('components.social-meta')
		@slot('title')
		    {{ $karya->nama }}
		@endslot
		@slot('desc')
		    {{ $karya->desc }}
		@endslot
		@slot('image')
		    {{ ($karya->img_thumb == NULL) ? asset('img/noimage.png') : asset($karya->img_thumb)}}
		@endslot
		@slot('author')
		    {{ $karya->user->name }}
		@endslot
	@endcomponent

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
@endpush

@section('body')	
	<div class="container">
		@if (Auth::check())
			@if (Auth::user()->id == $karya->user_id)
				<div class="row mt-3 mb-3">
					<div class="col-12 text-right">
						<a href="{{ route('karya.editview', ['karya' => $karya]) }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> Sunting Karya</a>
					</div>
				</div>
			@endif
		@endif
		<div class="row">
			<div class="col-12">
				<div class="card karya-box">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-9">	
								<div class="header">
									<img src="{{ ($karya->img_thumb == NULL) ? asset('img/noimage.png') : asset($karya->img_thumb)}}" alt="">
									<div class="beside">
										<span class="judul">{{ $karya->nama }}</span>
										<span class="waktu">diterbitkan pada {{ $karya->created_at->diffForHumans() }}</span>
									</div>
								</div>
								<div class="sharethis-inline-share-buttons mt-4 mb-4"></div>
								@if (!($karya->videos->count() == 0 && $karya->gallery->count() == 0))
								<b>Galeri</b>
								<ul class="gallery">
									@foreach ($karya->videos as $video)
										<li>
											<a data-fancybox="gallery" href="https://www.youtube.com/watch?v={{ $video->youtube_url }}">
												<div class="video">
													<img src="https://img.youtube.com/vi/{{ $video->youtube_url }}/mqdefault.jpg" alt="">
													<div class="play-button"><i class="fa fa-play"></i></div>
												</div>
											</a>
										</li>
									@endforeach

									@foreach ($karya->gallery as $gallery)
										<li>
											<a data-fancybox="gallery" href="{{ asset($gallery->img_url) }}"><img src="{{ asset($gallery->img_url) }}"></a>
										</li>
									@endforeach
								</ul>
								@endif
								<b>Deskripsi</b><br>
								{{ $karya->deskripsi }}

								<ul class="tag-list mt-4">
									@foreach ($karya->tags as $tag)
										<li><a href="{{ route('explore.tags', ['tags' => $tag])}}">{{ $tag->tag }}</a></li>
									@endforeach
								</ul>
							</div>
							<div class="col-lg-3 pt-3 pb-3 profiler profil">
								<div class="profil-karya">
									<img src="{{ $karya->user->profil_img == NULL ? asset('img/noprofilimage.png') : asset($karya->user->profil_img . '-60.jpg') }}"  class="rounded-circle mb-2" alt="">
									<div class="detail">
										<span><a href="{{ route('user.profile', ['user' => $karya->user]) }}" class="nama">{{ $karya->user->name }}</a></span>
										<span class="prodi">{{ $karya->user->prodi->nama }}</span>
									</div>
									
								</div>
								<p class="mt-3">
									<a href="{{ route('report', ['karya' => $karya])}}" class="btn btn-primary btn-sm btn-block"><i class="fa fa-exclamation-triangle"></i>  Laporkan karya ini</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection


@push('js')
<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5abce2b6003b52001341b066&product=inline-share-buttons"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script></script>
@endpush
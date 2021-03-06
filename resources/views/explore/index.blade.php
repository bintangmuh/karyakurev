@extends('layouts.user')

@section('title', 'Jelajah Karya - ')

@section('body')
	<div class="container">
		<h1 class="pt-4 mb-4 mt-3 text-center"><i class="fa fa-compass"></i> Jelajahi karya</h1>
		
		<div class="row justify-content-center mb-4 pb-4 mt-4 pt-4">
			<div class="">
				<form action="{{ route('search') }}" method="post" class="form-inline">
					{{ csrf_field() }}
					<input type="text" class="form-control" name="search" placeholder="Pencarian ... ">
					<button class="btn btn-light"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
		
		<b>Jelajah berdasarkan tag: </b>
				
		<ul class="tag-list mt-1 mb-4">
			@foreach ($tags as $tag)
				<li><a href="{{ route('explore.tags', ['tags' => $tag])}}">{{ $tag->tag }}</a></li>
			@endforeach
		</ul>
		<div class="row">
			@foreach ($karya as $karyaku)
		        <div class="col-lg-3 col-md-4 col-6">
					<div class="karya-card">
						<div class="img-thumbs">
							<img src="{{ ($karyaku->img_thumb != NULL ) ? asset($karyaku->img_thumb) : asset('img/noimage.png')}}" class="img-fluid">
						</div>
						<div class="name">
							<a href="{{ route('karya.tampil', ['karya' => $karyaku]) }}" class="title">{{ $karyaku->nama }}</a>
						</div>
					</div>
				</div>
		    @endforeach
		</div>

		<div class="d-flex justify-content-center mt-3">
			{{ $karya->links() }}
		</div>
	</div>
@endsection		
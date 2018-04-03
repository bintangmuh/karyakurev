@extends('layouts.user')

@section('title')
	{{ $tag->tag }} - Jelajah Karya
@endsection

@section('body')
	<div class="container">
		<h2 class="mb-4 mt-3 text-center"><i class="fa fa-tag"></i> Jelajah tag "{{ $tag->tag }}"</h2>
		<p class="text-center pb-4">Karya-karya yang terkumpul dengan tag <b>{{ $tag->tag }}</b></p>
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
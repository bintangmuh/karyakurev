@extends('layouts.user')

@section('title', 'Jelajah Karya - ')

@section('body')
	<div class="container">
		<h1 class="mb-4 mt-3"><i class="fa fa-compass"></i> Jelajahi karya</h1>
		<span>Jelajah berdasarkan tag: </span>
		<form action="" method="post">
			<input type="text" name="search">
			<button><i class="fa fa-search"></i></button>
		</form>
		<ul class="tag-list mt-1 mb-4">
			@foreach ($tags as $tag)
				<li><a href="">{{ $tag->tag }}</a></li>
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
@extends('layouts.user')

@section('title')
	Profil - {{ $user->name }}
@endsection

@section('body')
<div class="container" id="app">
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
					<span class="line mt-2"> <i class="fa fa-file-alt"></i> {{ $user->karya->count() }} Karya telah diunggah</span>
				</div>	
			</div>

			<div class="row mt-4 mb-4">
				<div class="col-lg-4 col-md- col-6" v-for="karya in data">
					<div class="karya-card">
						<div class="img-thumbs">
							<img src="{{ asset('img/noimage.png')}}" class="img-fluid">
						</div>
						<div class="name">
							<a :href="'{{ url("/karya/") }}/'+ karya.id" class="title">@{{ karya.nama }}</a>
						</div>
					</div>
				</div>
				<div class="col-12" v-if="next_page_url != null">
					<button v-on:click="selebihnya" class="btn btn-light mt-3 mb-0 btn-block  mx-auto"><i class="fa fa-arrow-down"></i> Lihat Lebih Banyak</button>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
	var app = new Vue({
		el: "#app",
		data: {
			data: {},
			next_page_url: '',
		},
		mounted: function() {
			axios.get('{{route('user.karya', ['user' => $user])}}')
			.then(function (response) {
			  app.data = response.data.data;
			  app.next_page_url = response.data.next_page_url;
			})
			.catch(function (error) {
			   console.log(error);
			});
		},
		methods: {
			selebihnya: function() {
				axios.get(this.next_page_url)
				.then(function (response) {
					app.data = app.data.concat(response.data.data);
					app.next_page_url = response.data.next_page_url;
				})
				.catch(function (error) {
				   console.log(error);
				});
			},
		},
	})
</script>
@endpush
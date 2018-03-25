@extends('layouts.user')

@section('title')
	{{ $karya->nama }} - Sunting
@endsection

@section('body')
<div class="container d-flex justify-content-center" id="app3">
	<div class="col-3">
		<div class="list-group">
			<a href="#" :class=" 'list-group-item ' + pageinfo" @click="setpageInfo">
				<i class="fa fa-info"></i>
				<span class="d-none d-md-block">Informasi Karya</span>
			</a>
			<a href="#" :class=" 'list-group-item ' + pageimage" @click="setpageImage">
				<i class="fa fa-image"></i>
				<span class="d-none d-md-block"n>Gambar Gallery</span>
			</a>
			<a href="#" :class=" 'list-group-item ' + pagevideo" @click="setpageVideo">
				<i class="fab fa-youtube"></i>
				<span class="d-none d-md-block">Video Penunjang</span>
			</a>
		</div>
	</div>
	<div class="col-9 ">
		<div class="card">
			<div :class="'card-body ' + [ pageinfo == 'active' ? '' : 'd-none' ]">
				@if(isset($success))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Sukses</strong> {{ $success }}
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				@endif
				<h4>Sunting Karya {{ $karya->nama }}</h4>
				<div class="row">
					<div class="col-sm-8">
						<form action="{{ route('karya.edit', ['karya' => $karya]) }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="nama">Judul Karya: </label>
								<input type="text" name="nama" class="form-control {{ $errors->has('nama') ? ' is-invalid ' : '' }}" id="nama" value="{{ $karya->nama }}" >
								@if ($errors->has('nama'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label for="deskripsi">Deskripsi Singkat Karya: </label>
								<textarea class="form-control" rows="7" name="deskripsi" id="deskripsi">{{ $karya->deskripsi }}</textarea>
							</div>
							<div class="form-group">
								<label for="kategori">Kategori:</label>
								<input type="text" class="form-control" id="nama">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Simpan Perubahan">
							</div>
						</form> 
					</div>
					<div class="col-sm-4">
						<form action="">
							<b>Thumbnail</b><br>	
							<img class="img-thumbnail" src="{{ asset('img/noimage.png') }}" alt="Generic placeholder image">
							<label class="custom-file-form btn btn-primary">
								<input type="file" name="thumbs">
								unggah gambar
							</label>
							
						</form>
					</div>			
				</div>
			</div>
			{{-- Gallery --}}
			<div :class="'card-body ' + [ pageimage == 'active' ? '' : 'd-none' ]">
				<h4>Tambah Gambar Penunjang Karya</h4>
				<div class="row">
					<div class="col-12">
						<form action="{{ route('karya.buat.gambar', ['karya' => $karya]) }}"  v-on:submit.prevent method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="col-xs-6">
								<img :src="image" class="img-fluid img-thumbnail mr-3" width="100px" id="imgprev">
								<label class="custom-file-form btn btn-light">
									<input type="file" v-on:change="onImageChange" name="image">
									<i class="fa fa-folder"></i> pilih gambar
								</label>
							</div>
							<div class="col-xs-6">
								<button type="submit" class="btn btn-primary" @click="imageUpload" ><i class="fa fa-upload"></i> Unggah gambar</button>
							</div>
						</form>
					</div>
					<div class="col-12">
						<h4>Gallery</h4>
						<div v-for="(image, index) in images">
							<img :src="'{{ asset('/') }}' + image.img_url " class="img-fluid img-thumbnail" width="200px">
							<button class="btn btn-primary"><i class="fa fa-trash"></i> Hapus Gambar</button>
						</div>
					</div>			
				</div>
			</div>		
			{{-- Video --}}
			<div :class="'card-body ' + [ pagevideo == 'active' ? '' : 'd-none' ]">
				<h4>Tambah Video Baru</h4>
				<div class="row">
					<form action="{{ route('karya.buat.video', ['karya' => $karya])}}" method="POST" v-on:submit.prevent class="col">
						{{ csrf_field() }}
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube" style="color:red;"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="Youtube URL: https://www.youtube.com/watch?v=xMILG_ASK84" aria-label="Username" name="youtubeurl" v-model="youtubeurl">
							<button class="btn btn-primary" v-on:click="addVideo"><i class="fab fa-youtube"></i> Tambah video</button>			
						</div>
					</form>
				</div>
				<h4 class="mt-4"><i class="fab fa-youtube" ></i> Video</h4>
				<div class="row">
					<div class="col-sm-6 video-list text-center" v-for="(video, index) in videos">
						<a :href="'https://www.youtube.com/watch?v' + video.youtube_url" target="_blank">
							<img :src="'https://img.youtube.com/vi/'+ video.youtube_url +'/mqdefault.jpg'" class="img-fluid img-thumbnail">
						</a>
						<p>
							Ditambahkan pada <b>@{{ video.created_at }}</b>
							
							<button class="btn btn-danger" v-on:click="removeVideo(index)"><i class="fa fa-trash"></i> Hapus Video</button>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
@endsection


@push('js')
<script src="{{ asset("/js/sweetalert2.all.js") }}"></script>	
<script>
    $("#imgprev").hide();

	var app3 = new Vue({
		el: '#app3',
		data: {
			pageinfo: 'active',
			pageimage: '',
			pagevideo: '',
			imagethumbs: '',
			image: '',
			images: {!! $karya->gallery !!},
			uploadgallerystauts: '',
			youtubeurl: '',
			videos: {!! $karya->videos !!},
		},
		methods: {
			setpageInfo: function(event) {
				this.pageinfo = 'active'
				this.pageimage = ''
				this.pagevideo = ''
			},
			setpageImage: function(event) {
				this.pageinfo = ''
				this.pageimage = 'active'
				this.pagevideo = ''
			},
			setpageVideo: function(event) {
				this.pageinfo = ''
				this.pageimage = ''
				this.pagevideo = 'active'
			},
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    app3.image = e.target.result;
                    $("#imgprev").show();
                };
                reader.readAsDataURL(file);
            },
            imageUpload() {
            	axios.post('{{ route('karya.buat.gambar', ['karya' => $karya]) }}',{image: this.image}).then(response => {
            		app3.image = '';
            		$("#imgprev").hide();
                	console.log("Sukses Upload");
                })
                .catch(function (error) {
				    if (error.response) {
				      // The request was made and the server responded with a status code
				      // that falls out of the range of 2xx
				      swal('Kesalahan', 'error : ' + error.response.data.message, 'error');
				    } else if (error.request) {
				      // The request was made but no response was received
				      // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
				      // http.ClientRequest in node.js
				      console.log(error.request);
				    } else {
				      // Something happened in setting up the request that triggered an Error
				      console.log('Error', error.message);
				    }
				    console.log(error.config);
				  });
            },
            addVideo() {
            	axios.post('{{ route('karya.buat.video', ['karya' => $karya]) }}',{youtubeurl: this.youtubeurl}).then(response => {
            		app3.youtubeurl = '';
            		this.videos.push(response.data.video);
					swal('Terunggah!','Video telah berhasil ditambahkan	','success');
                })
                .catch(function (error) {
				    if (error.response) {
				      // The request was made and the server responded with a status code
				      // that falls out of the range of 2xx
				      swal('Kesalahan', '<b>Error</b> : ' + error.response.data.youtubeurl, 'error');
				      console.log(error.response);
				    } else if (error.request) {
				      // The request was made but no response was received
				      // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
				      // http.ClientRequest in node.js
				      console.log(error.request);
				    } else {
				      // Something happened in setting up the request that triggered an Error
				      console.log('Error', error.message);
				    }
				    console.log(error.config);
				  });
            },
            removeVideo(index) {
				swal({
					title: 'Anda yakin akan menghapus video ini?',
					text: "Anda tidak bisa mengembalikan apapun yang sudah dihapus",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Hapus'
				}).then((result) => {
					  if (result.value) {
					  	axios.post('{{ route('karya.hapus.video', ['karya' => $karya]) }}',{video: this.videos[index].id}).then(response => {
					   		swal('Terhapus!','Video yang anda pilih telah dihapus','success');
					  		this.videos.splice(index, 1);
		                })
		                .catch(function (error) {
						    if (error.response) {
						      // The request was made and the server responded with a status code
						      // that falls out of the range of 2xx
						      swal('Kesalahan', '<b>Error</b> : ' + error.response.data, 'error');
						      console.log(error.response);
						    } else if (error.request) {
						      // The request was made but no response was received
						      // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
						      // http.ClientRequest in node.js
						      console.log(error.request);
						    } else {
						      // Something happened in setting up the request that triggered an Error
						      console.log('Error', error.message);
						    }
						    console.log(error.config);
						 });
					}
				})
            }
		},
		filters: {
			
		}
	})
</script>
	
@endpush
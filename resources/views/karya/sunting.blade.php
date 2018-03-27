@extends('layouts.user')

@push('css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title')
	{{ $karya->nama }} - Sunting
@endsection

@section('body')
<div class="container" id="app3">
	<div class="row">
		<div class="col-sm-12 col-md-2">
			<div class="list-group d-none d-md-block">
				<a href="#" :class=" 'list-group-item ' + pageinfo" @click="setpageInfo">
					<i class="fa fa-info"></i> Informasi
				</a>
				<a href="#" :class=" 'list-group-item ' + pageimage" @click="setpageImage">
					<i class="fa fa-image"></i> Gallery
				</a>
				<a href="#" :class=" 'list-group-item ' + pagevideo" @click="setpageVideo">
					<i class="fab fa-youtube"></i> Video
				</a>
			</div>

			{{-- If less than medium --}}
			<ul class="nav nav-pills nav-fill mb-3 d-md-none">
			  <li class="nav-item card">
			    <a :class="'nav-link ' + pageinfo" @click="setpageInfo" href="#"><i class="fa fa-info"></i> Informasi</a>
			  </li>
			  <li class="nav-item card">
			    <a :class="'nav-link ' + pageimage" @click="setpageImage" href="#"><i class="fa fa-image"></i> Gallery</a>
			  </li>
			  <li class="nav-item card">
			    <a :class="'nav-link ' + pagevideo" @click="setpageVideo" href="#"><i class="fab fa-youtube"></i> Video</a>
			  </li>
			</ul>
		</div>
		<div class="col-sm-12 col-md-10">
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
					<h4><i class="fa fa-pencil-alt"></i> Sunting Karya {{ $karya->nama }}</h4>
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

									<select class="form-control" id="input-tags" name="tags[]" multiple="true">
										@foreach ($tags as $tag)
											<option value="{{ $tag->id }}">{{ $tag->tag }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Simpan Perubahan">
								</div>
							</form> 
						</div>
						<div class="col-sm-4">
							<form action="">
								<b>Thumbnail</b><br>
								<div class="thumbimg">
									<img class="img-thumbnail" id="thumbimg" src="{{ ($karya->img_thumb != NULL) ? asset($karya->img_thumb) : asset('/img/noimage.png')}}">
									<label class="custom-file-form btn btn-primary btn-lg">
										<input type="file" name="thumbs" v-on:change="onThumbnailChange">
										<i class="fa fa-pencil-alt"></i>
									</label>
								</div>	
								
								<div class="alert alert-warning" style="display: none" id="ld-thumbs"><i class="loading"></i> Proses Mengunggah ... </div>
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
								<div>
									<div class="col-xs-6" id="imgprev">
										<img :src="image" class="img-fluid img-thumbnail mr-3" width="200px">
									</div>
									<div class="col-xs-6">
										<label class="custom-file-form btn btn-light">
											<input type="file" v-on:change="onImageChange" name="image">
											<i class="fa fa-folder"></i> pilih gambar
										</label><br>	
										<button type="submit" class="btn btn-primary" @click="imageUpload" ><i class="fa fa-upload"></i> Unggah gambar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-12 pt-5">
							<div class="alert alert-warning" id="ld-gallery"><i class="loading"></i> Proses Mengunggah ... </div>

							<div class="row">
								<div class="col-6 col-md-4" v-for="(image, index) in images">
									<div class="thumb-gallery">
										<img :src="'{{ asset('/') }}' + image.img_url " class="img-fluid img-thumbnail">
										<button class="btn btn-danger" @click="removeImage(index)" data-toggle="tooltip" data-placement="top" title="Hapus Gambar Ini"><i class="fa fa-times"></i></button>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>		
				{{-- Video --}}
				<div :class="'card-body ' + [ pagevideo == 'active' ? '' : 'd-none' ]">
					<div class="row">
						<form action="{{ route('karya.buat.video', ['karya' => $karya])}}" method="POST" v-on:submit.prevent class="col">
							{{ csrf_field() }}
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube" style="color:red;"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Youtube URL: https://www.youtube.com/watch?v=xMILG_ASK84" aria-label="Username" name="youtubeurl" v-model="youtubeurl">
								<button class="btn btn-primary" @click="addVideo"><i class="fab fa-youtube"></i> Tambah video</button>			
							</div>
						</form>
					</div>
					<h4 class="mt-4 mb-4"><i class="fab fa-youtube" ></i> Video</h4>
					<div class="row">
						<div class="col-sm-6 col-md-4" v-for="(video, index) in videos">
							<div class="thumb-gallery">
								<a :href="'https://www.youtube.com/watch?v=' + video.youtube_url" target="_blank">
									<img :src="'https://img.youtube.com/vi/'+ video.youtube_url +'/mqdefault.jpg'" class="img-fluid">
								</a>
								<button class="btn btn-danger" @click="removeVideo(index)"><i class="fa fa-times"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
@endsection


@push('js')
<script src="{{ asset("/js/selectize.min.js") }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
	    $('#input-tags').select2({
	    	placeholder: "Pilih kategori",
	    });
	});
	
</script>	
<script>
    $("#imgprev").hide();
    $("#ld-gallery").hide();
    $("#ld-thumbs").hide();
    $("#thumbs-preview").hide();

	var app3 = new Vue({
		el: '#app3',
		data: {
			pageinfo: 'active',
			pageimage: '',
			pagevideo: '',
			thumbs: '',
			image: '',
			images: {!! $karya->gallery !!},
			uploadgallerystauts: '',
			youtubeurl: '',
			tags: [],
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
			addTag() {},
			removeTag() {},
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            onThumbnailChange(e) {
            	let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createThumbsImage(files[0]);
				swal({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.value) {
					this.thumbnailUpload();
				  }
				})
            },
            thumbnailUpload() {
            	$("#ld-thumbs").show();
   				axios.post('{{ route('karya.buat.thumbs', ['karya' => $karya]) }}',{thumbs: app3.thumbs}).then(response => {
    				$('#thumbimg').attr('src', '{{ asset(null) }}' + response.data.thumbs + '');
    				console.log(response.data.thumbs);
   					$("#ld-thumbs").hide();
					swal('Terunggah!','Gambar thumbnail telah berhasil diganti	','success');
                })
                .catch(function (error) {
				    if (error.response) {
				      // The request was made and the server responded with a status code
				      // that falls out of the range of 2xx
				      console.log(error.response);
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
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    app3.image = e.target.result;
                    $("#imgprev").show();
                };
                reader.readAsDataURL(file);
            },
            createThumbsImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    app3.thumbs = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            imageUpload() {
    			$("#ld-gallery").show();

            	axios.post('{{ route('karya.buat.gambar', ['karya' => $karya]) }}',{image: this.image}).then(response => {
            		app3.image = '';
					swal('Terunggah!','Gambar galeri telah berhasil ditambahkan	','success');
            		this.images.push(response.data.image);
            		$("#imgprev").hide();
    				$("#ld-gallery").hide();
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

            removeImage(index) {
				swal({
					title: 'Anda yakin akan menghapus gambar ini?',
					text: "Anda tidak bisa mengembalikan apapun yang sudah dihapus",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Hapus'
				}).then((result) => {
					  if (result.value) {
					  	axios.post('{{ route('karya.hapus.gambar', ['karya' => $karya]) }}',{image: this.images[index].id}).then(response => {
					   		swal('Terhapus!','Video yang anda pilih telah dihapus','success');
					  		this.images.splice(index, 1);
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
@extends('layouts.user')

@section('title')
	{{ $karya->nama }} - Sunting
@endsection

@section('body')
<div class="container d-flex justify-content-center" id="app3">
	<div class="col-3">
		<div class="list-group">
			<a href="#" :class=" 'list-group-item ' + pageinfo" @click="setpageInfo">Informasi Karya</a>
			<a href="#" :class=" 'list-group-item ' + pageimage" @click="setpageImage">Gambar Gallery</a>
			<a href="#" :class=" 'list-group-item ' + pagevideo" @click="setpageVideo">Video Penunjang</a>
		</div>
	</div>
	<div class="col-9 ">
		<div class="card">
			@if(isset($success))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Sukses</strong> {{ $success }}
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			@endif

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div :class="'card-body ' + [ pageinfo == 'active' ? '' : 'd-none' ]">
				<h4>Sunting Karya {{ $karya->nama }}</h4>
				<div class="row">
					<div class="col-sm-8">
						<form action="{{ route('karya.edit', ['karya' => $karya]) }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="nama">Judul Karya: </label>
								<input type="text" name="nama" class="form-control" id="nama" value="{{ $karya->nama }}" >
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

			<div :class="'card-body ' + [ pageimage == 'active' ? '' : 'd-none' ]">
				<h4>Tambah Gambar Penunjang Karya</h4>
				<div class="row">
					<div class="col-12">
						<form action="{{ route('karya.buat.gambar', ['karya' => $karya]) }}"  method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="col-xs-6">
								<img :src="image" class="img-fluid img-thumbnail mr-3" width="100px" alt="">
								<label class="custom-file-form btn btn-light">
									<input type="file" v-on:change="onImageChange" name="image">
									<i class="fa fa-image"></i> pilih gambar
								</label>
							</div>
							<div class="col-xs-6">
								<button type="submit" class="btn btn-primary" @click="imageUpload" ><i class="fa fa-upload"></i> Unggah gambar</button>
							</div>
						</form>
					</div>
					<div class="col-12">
						<h4>Gallery</h4>
						@foreach ($karya->gallery as $gallery)
							<img src="{{ $gallery->img_url }}" class="img-fluid img-thumbnail" width="200px">
						@endforeach
					</div>			
				</div>
			</div>		

			<div :class="'card-body ' + [ pagevideo == 'active' ? '' : 'd-none' ]">
				<h4>Tambah Video Baru</h4>
				<div class="row">
					<div class="col">
						<label class="custom-file-form btn btn-primary">
								<input type="text" name="thumbs">
								unggah gambar
						</label>
					</div>			
				</div>
			</div>
		</div>
	</div>
</div>		
@endsection


@push('js')

<script>
	var app3 = new Vue({
		el: '#app3',
		data: {
			pageinfo: 'active',
			pageimage: '',
			pagevideo: '',
			imagethumbs: '',
			image: '',
			images: [],
			uploadgallerystauts: '',
			video: '',
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
                };
                reader.readAsDataURL(file);
            },
            imageUpload() {
            	axios.post('{{ route('karya.edit', ['karya' => $karya]) }}',{image: this.image}).then(response => {
                   console.log(response);
                });
            }
		}
	})
</script>
	
@endpush
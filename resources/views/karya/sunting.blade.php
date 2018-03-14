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
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div :class="'card-body ' + [ pageinfo == 'active' ? '' : 'd-none' ]">
				<h4>{{ $karya->nama }}</h4>
				<div class="row">
					<div class="col">
						<form action="{{ route('karya.edit', ['karya' => $karya]) }}" method="POST">
							 {{ csrf_field() }}
							<div class="form-group">
								<label for="nama">Judul Karya: </label>
								<input type="text" name="nama" class="form-control" id="nama" value="{{ $karya->nama }}">
							</div>
							<div class="form-group">
								<label for="deskripsi">Deskripsi Singkat Karya: </label>
								<textarea class="form-control" rows="7" name="deskripsi" id="deskripsi" value="{{ $karya->deskripsi }}"></textarea>
							</div>
							<div class="form-group">
								<label for="kategori">Kategori:</label>
								<input type="text" name="nama" class="form-control" id="nama">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Simpan Perubahan">
							</div>
						</form> 
					</div>			
				</div>
			</div>

			<div :class="'card-body ' + [ pageimage == 'active' ? '' : 'd-none' ]">
				<h4>Tambah Gambar Penunjang Karya</h4>
				<div class="row">
					<div class="col-12">
						<form action="{{ route('karya.edit', ['karya' => $karya]) }}" method="POST">
							 {{ csrf_field() }}
							<div class="form-group">
								<input type="file">								
							</div>
						</form>
					</div>
					<div class="col-12">
						<h4>Gallery</h4>
					</div>			
				</div>
			</div>		

			<div :class="'card-body ' + [ pagevideo == 'active' ? '' : 'd-none' ]">
				<h4>Tambah Video Baru</h4>
				<div class="row">
					<div class="col">
						<form action="{{ route('karya.edit', ['karya' => $karya]) }}" method="POST">
							 {{ csrf_field() }}
							<input type="file">
						</form>
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
			}
		}
	})
</script>
	
@endpush
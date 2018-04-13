@extends('layouts.user')
@section('title', 'Beranda - ')
@section('body')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-3">
            <div class="card d-none d-md-block">
                <div class="card-body">
                    <img src="{{ Auth::user()->profil_img == NULL ? asset('img/noprofilimage.png') : asset(Auth::user()->profil_img . '-100.jpg') }}"  class="rounded-circle" alt=""> <br>
                    <b>{{ Auth::user()->name }}</b> <br>
                    {{ Auth::user()->nim }} <br>
                    {{ Auth::user()->prodi->nama }}
                </div>
            </div>
            <a href="{{ route('karya.buatview') }}" class="btn btn-primary btn-block mt-3 mb-3"><i class="fa fa-file"></i> Tambah Karya Baru</a>
        </div>
        <div class="col-md-9">
            <div class="card">
                {{-- <div class="card-header bg-prixmary" style="color: #fff"><b>Karya yang baru diunggah ... </b></div> --}}
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="media-newsfeed" v-for="karya in data">
                        <div class="media">
                            <a :href="'{{ url("/karya/") }}/'+ karya.id"><img class="mr-3 img-thumbnail" :src="'{{ url('/') }}' + (karya.img_thumb == null ? '/img/noimage.png' : karya.img_thumb)" width="50px"></a>
                            <div class="media-body">
                                <span class="title"><a :href="'{{ url("/karya/") }}/'+ karya.id"><b>@{{ karya.nama }}</b></a></span>
                                <span class="date"><i class="fa fa-calendar-alt"></i> @{{ karya.created_at | dateFormat }} oleh <a :href="'{{ url("/profile/") }}/'+ karya.user.id">@{{ karya.user.name }}</a></span>
                            </div>
                        </div>
                        <p class="desc">
                            @{{ karya.deskripsi }}
                            <span class="row">
                                <span class="col-12">
                                    <a :href="'{{ url("/karya/") }}/'+ karya.id" class="btn btn-primary btn-sm btn-info mt-2"><i class="fa fa-eye"></i>  Selengkapnya</a>
                                </span>
                            </span>
                        </p>
                    </div>
                                       
                </div>
            </div>
            <button v-on:click="selebihnya" v-if="next_page_url != null" class="btn btn-light mt-3 mb-3 btn-block  mx-auto"><i class="fa fa-arrow-down"></i> Lihat Lebih Banyak</button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('/js/moment-with-locales.js')}}"></script>       
<script>
    var app = new Vue({
        el: "#app",
        data: {
            data: {},
            next_page_url: '',
        },
        mounted: function() {
            axios.get('{{route('home.list')}}')
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
        filters: {
            dateFormat: function(value) {
                moment.locale('id');
                return moment(value).format('LLL');
            }
        }
    })
</script>
@endpush
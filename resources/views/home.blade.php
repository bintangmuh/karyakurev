@extends('layouts.user')
@section('title', 'Beranda - ')
@section('body')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-3">
            <div class="card d-none d-md-block">
                <div class="card-body">
                    <img src="{{ asset('img/noprofilimage.png') }}"  class="rounded-circle" alt=""> <br>
                    <b>{{ Auth::user()->name }}</b> <br>
                    {{ Auth::user()->nim }} <br>
                    {{ Auth::user()->prodi }}
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
                    <div class="media media-newsfeed" style="padding-bottom: 20px;" v-for="karya in data">
                        <a href="#"><img class="mr-3 img-thumbnail" src="{{ asset('img/noimage.png') }}" width="100px"></a>
                        
                        <div class="media-body">
                            <span class="title"><a href="#"><b>@{{ karya.nama }}</b></a></span>
                            <span class="date"><i class="fa fa-calendar-alt"></i> @{{ karya.created_at }} oleh <a href="#">@{{ karya.user.name }}</a></span>
                        </div>
                    </div>
                                       
                </div>
            </div>
            <button v-on:click="selebihnya" v-if="next_page_url != null" class="btn btn-light mt-3 mb-3 btn-block  mx-auto"><i class="fa fa-arrow-down"></i> Lihat Lebih Banyak</button>
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
    })
</script>
@endpush
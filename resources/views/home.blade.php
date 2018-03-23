@extends('master')
@section('title', 'Beranda - ')
@section('content')
@include('components.navbar')
<div class="container">
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
                    @foreach ($karya as $karyatunggal)
                    <div class="media media-newsfeed" style="padding-bottom: 20px;">
                        <a href="{{ route('karya.tampil', ['karya' => $karyatunggal]) }}"><img class="mr-3 img-thumbnail" src="{{ asset('img/noimage.png') }}" alt="Generic placeholder image"></a>
                        
                        <div class="media-body">
                            <span class="title"><a href="{{ route('karya.tampil', ['karya' => $karyatunggal]) }}"><b>{{ $karyatunggal->nama }}</b></a></span>
                            <span class="date">{{ $karyatunggal->created_at }}</span>
                            <span class="author">
                                <img src="{{ asset('img/noprofilimage.png') }}" height="16pt" class="rounded-circle" alt=""> {{ $karyatunggal->user->name }}
                            </span>
                            <div class="desc d-none d-md-block">
                                {{ $karyatunggal->deskripsi }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
            <a href="#" class="btn btn-light mt-3 mb-3 btn-block  mx-auto"><i class="fa fa-arrow-down"></i> Lihat Lebih Banyak</a>
        </div>
    </div>
</div>
@endsection
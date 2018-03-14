@extends('master')

@section('title', 'Beranda - ')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card d-none d-md-block">
                <div class="card-body">
                    <img src="{{ asset('img/noprofilimage.png') }}"  class="rounded-circle" alt=""> <br>
                    {{ Auth::user()->name }} <br>
                    {{ Auth::user()->nim }} <br>
                    {{ Auth::user()->prodi }}
                </div>
            </div>
            <a href="{{ route('karya.buatview') }}" class="btn btn-primary btn-block">Tambah Karya Baru</a>
        </div>
        <div class="col-sm-9">
            <div class="card">
                {{-- <div class="card-header bg-primary" style="color: #fff"><b>Karya yang baru diunggah ... </b></div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach ($karya as $karyatunggal)
                        <div class="media media-newsfeed" style="padding-bottom: 20px;">
                          <img class="mr-3 img-thumbnail" src="{{ asset('img/noimage.png') }}" alt="Generic placeholder image">
                          <div class="media-body">
                            <h5 class="mt-0"><b>{{ $karyatunggal->nama }}</b></h5>
                            {{ $karyatunggal->deskripsi }}
                          </div>
                        </div>
                    @endforeach
                    
                    
                </div>
            </div>
            <a href="#" class="btn btn-default">Lihat Lebih Banyak</a>
        </div>
    </div>
</div>
@endsection

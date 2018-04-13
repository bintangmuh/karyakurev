@extends('master')

@section('content')
    <div class="bg-uny bg-gradient">
        <div class="container">
            <div class="row vh100 justify-content-center align-items-center text-center">
                <div id="index-desc" class="col col-12 col-lg-8">
                    <img src="{{ asset('/img/karyaku-white-full-200px.png') }}" height="100px" class="img-fluid" id="big-logo">
                    <p>Direktori karya mahasiswa, unggah karya anda! Biarkan dunia melihat kemampuan anda!</p>
                    <a href="{{ url('/login')}}" class="btn btn-lg btn-success"><i class="fa fa-lock"></i> Login</a> 
                    <span class="ml-4 mr-4 text-white">|</span> 
                    <a href="{{ url('/explore')}}" class="btn btn-lg btn-secondary"><i class="fa fa-compass"></i> Explore</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('master')

@section('content')
    @include('components.navbar')

    <div class="bg-uny bg-gradient">
        <div class="container vh100">
            <div class="row justify-content-center">
                <div id="index-desc" class="col col-12 col-lg-8">
                    <img src="{{ asset('/img/karyaku-white-full-200px.png') }}" height="100px" class="img-fluid" id="big-logo">
                    <p>Direktori karya mahasiswa, unggah karya anda! Biarkan dunia melihat kemampuan anda!</p>
                </div>
                <div class="col col-12 col-lg-4">
                    <div class="box-card">
                        <h3>Login</h3>
                        <form action="">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3>Baru saja diunggah...</h3>        
    </div>   
@endsection


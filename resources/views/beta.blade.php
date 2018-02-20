<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">
    <meta name="theme-color" content="#B721FF">
    <title>Karyaku - Coming Soon!</title>
    
    <style>
        body {
            background-image: linear-gradient(19deg, rgba(33, 212, 253, 0.8) 0%, rgba(183, 33, 255, 0.8) 100%), url('{{ asset('/img/bg.jpg') }}');
            background-size: cover;
            background-position: center center;
        }
        .welcome-img {
            max-width: 400px;
            width: 100%;
            margin-bottom: 30px;
        }
        .welcome-desc {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container" style="height: 100vh">
        <div class="row row h-100">
            <div class="col-sm-12 my-auto text-center">
                <img src="{{ asset('/img/karyaku-white-full-200px.png') }}" alt="karyaku_logo" class="img-fluid welcome-img">
                <p class="welcome-desc"><b>Karyaku adalah direktori karya mahasiswa <i>tidak resmi</i> Universitas Negeri Yogyakarta. Karyaku bertujuan mempublikasikan karya-karya mahasiswa secara daring</b></p>
                {{--  <h1>Coming Soon!</h1>  --}}
                <a href="http://github.com/bintangmuh" target="_blank" class="btn btn-primary">Bintang Muhammad (@bintangmuh)</a>
            </div>
            
        </div>  
    </div>
    
</body>
</html>
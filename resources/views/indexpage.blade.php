@extends('master')

@section('content')
    <div class="bg-uny bg-gradient">
        <div class="container vh100">
            <div class="row vh100 justify-content-center align-items-center">
                <div id="index-desc" class="col col-12 col-lg-8">
                    <img src="{{ asset('/img/karyaku-white-full-200px.png') }}" height="100px" class="img-fluid" id="big-logo">
                    <p>Direktori karya mahasiswa, unggah karya anda! Biarkan dunia melihat kemampuan anda!</p>
                </div>
                <div class="col col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <b>Login</b>
                            <hr>
                             <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 control-label">Email</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid ' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid ' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat akun saya
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                    </div>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Lupa password anda?
                                    </a>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">Belum memiliki akun? <a href="{{ url('/register') }}">Daftar</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3>Baru saja diunggah...</h3>        
    </div>   
@endsection


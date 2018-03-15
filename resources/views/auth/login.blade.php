@extends('master')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="col text-center"> 
                <img src="{{ asset('img/karyaku-full-200px.png') }}" style="max-width: 200px; margin: 20px 0px;" class="img-fluid" alt="Karyaku">
            </div>
            <div class="card">
            
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

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

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa password anda?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p style="margin: 10px 0px;" class="text-center">Belum memiliki akun? Silahkan <a href="{{ url('register') }}">Daftar</a></p>
        </div>
    </div>
</div>
@endsection

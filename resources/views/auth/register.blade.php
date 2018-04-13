@extends('master')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
@include('components.navbar')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="col text-center"> 
                <img src="{{ asset('img/karyaku-full-200px.png') }}" style="max-width: 200px; margin: 20px 0px;" class="img-fluid" alt="Karyaku">
            </div>
            <div class="card card-primary">
                <div class="card-body">
                    <h4 class="text-center">Pendaftaran Akun</h4>
                    <hr>    
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 control-label">Nama Lengkap</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid ' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control {{ $errors->has('username') ? ' is-invalid ' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 control-label">Alamat Email</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid ' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="prodi" class="col-md-4 control-label">Program Studi</label>

                            <div class="col-md-8">
                               <select name="prodi" class="form-control {{ $errors->has('prodi') ? ' is-invalid ' : '' }}" id="prodi">
                                   @php
                                       $prodilist = App\Prodi::all();
                                   @endphp

                                   @foreach ($prodilist as $prodi)
                                       <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('prodi'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('prodi') }}</strong>
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
                            <label for="password-confirm" class="col-md-4 control-label">Ulang Password</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid ' : '' }}" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p class="mt-2 mb-4 text-center"> Sudah memiliki akun? <a href="{{ url('/login') }}">Masuk</a></p>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#prodi').select2();
        });
    </script>
@endpush
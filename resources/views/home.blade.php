@extends('master')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card d-none d-md-block">
                <div class="card-body">
                    <h4>Profile</h4>
                    Nama   : {{ Auth::user()->name }} <br>
                    NIM   : {{ Auth::user()->nim }} <br>
                    Prodi : {{ Auth::user()->prodi }}
                </div>
            </div>
            <a href="{{ route('karya.buatview') }}" class="btn btn-primary btn-block">Tambah Karya Baru</a>
        </div>
        <div class="col-sm-9">
            <div class=card-default">
                <div class="card-header">Recent Stories</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

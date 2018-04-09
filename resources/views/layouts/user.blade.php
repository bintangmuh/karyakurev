@extends('master')

@push('css')
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans" rel="stylesheet"> 
@endpush
@section('content')
	@include('components.navbar')

	@yield('body')

	<div class="footer">
		Copyright &copy; 2018. <a href="http://twitter.com/bintang_muh" target="__blank">Karyaku</a>. PTI 2014.
	</div>
@endsection
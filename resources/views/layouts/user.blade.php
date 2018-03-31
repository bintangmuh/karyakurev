@extends('master')

@section('content')
	@include('components.navbar')

	@yield('body')

	<div class="footer">
		Copyright &copy; 2018. <a href="http://twitter.com/bintang_muh" target="__blank">Bintang Muhammad</a>. PTI 2014.
	</div>
@endsection
@extends('layouts.user')

@section('title', 'Profil - ')

@section('body')
<div class="container">
	<div class="card">
		{{ $user }}
	</div>
</div>
@endsection
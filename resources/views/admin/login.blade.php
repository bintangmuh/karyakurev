<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Administrator Karyaku</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/admin/style.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/fontawesome-all.min.css') }}">
        <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">
	</head>
	<body class="app flex-row align-items-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="card-group">
						<div class="card p-4">
							<div class="card-body text-center">
								<img src="{{ asset('img/karyaku-full-200px.png') }}" alt="Karyaku" class="img-fluid mb-4" style="max-width: 150px;">
								<p class="text-muted">Login ke administrator</p>
								<form action="{{ route('admin.login.post') }}" class="row" method="POST">
									{{ csrf_field() }}
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-user"></i></span>
										</div>
										<input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid ' : '' }}" name="username" placeholder="Username" value="{{ old('username') }}">
										@if ($errors->has('username'))
		                                    <span class="invalid-feedback">
		                                        <strong>{{ $errors->first('username') }}</strong>
		                                    </span>
		                                @endif
									</div>
									<div class="input-group mb-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-lock"></i></span>
										</div>
										<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid ' : '' }}" name="password" placeholder="Password">

										@if ($errors->has('password'))
		                                    <span class="invalid-feedback">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif
									</div>
									<div class="row">
										<div class="col-12">
											<button type="submit" class="btn btn-primary px-4 btn-block">Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p class="mt-4 pt-4 mb-4 text-center">Copyright &copy; Karyaku 2018</p>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	</body>
</html>
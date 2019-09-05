<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
	<title>Login</title>
</head>
<body>
	<div class="login">
		<h3 class="judul-login">Login</h3>
		<form action="/login/admin" method="post" class="form-login">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="label-login">Username</label>
				<input type="text" name="username" class="form-control" required="">
			</div>
			<div class="form-group">
				<label class="label-login">Password</label>
				<input type="password" name="password" class="form-control" required="">
			</div>
			<button type="submit" class="btn btn-success btn-login">Login</button>
		</form>
	</div>
</body>
</html>
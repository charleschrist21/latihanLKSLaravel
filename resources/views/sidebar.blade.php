<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
	<title>Latihan LKS</title>
</head>
<body>
<div>
	<div class="sidebar">
			
		@foreach($find as $f)
		<div class="sidebar-user">
			<img src="{{ url('/data_file/'.$f->image) }}" class="image-sidebar">
			<p class="name-sidebar">{{ $f->username }}</p>
			<div class="admin-sidebar">Admin</div>
		</div>
		<div class="sidebar-tanggal">
			<p class="sidebar-hari"><?php echo date('l'); ?></p>
			<p class="sidebar-bulan"><?php echo date('d M'); ?></p>
			<p class="sidebar-tahun"><?php echo date('Y'); ?></p>
		</div>
		<div class="sidebar-menu">
			<h2 class="sidebar-menu-judul">Menu</h2>
			<a href="/post/manage?id=" class="sidebar-button">POST</a>
			<br>
			<a href="/admin/manage?id=" class="sidebar-button-2">ADMIN</a>
		</div>
		<div class="sidebar-logout">
			<a href="/" class="sidebar-button-2">Logout</a>
		</div>
		@endforeach

	</div>
	<div class="content">
		@yield('content')
	</div>
</div>

</body>
</html>
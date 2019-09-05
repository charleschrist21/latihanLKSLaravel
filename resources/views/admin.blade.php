@extends('sidebar')

@section('content')
	<div class="container">

			<div class="allpost-admin">
				<h5 class="allpost-text">All Post</h5>
				<div class="icon-allpost"></div>
				<p class="allpost-total">24 post</p>

				<div class="table">
					<table class="allpost-table">
						<thead>
							<tr>
								<th>ID</th>
								<th class="t-judul">Image</th>
								<th class="t-judul">Full Name</th>
								<th class="t-judul">Username</th>
								<th class="t-judul">Email</th>
								<th class="t-judul">Added By</th>
								<th class="t-judul">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($admin as $a)
							
							<tr>
								<td>{{ $a->id }}</td>
								<td class=""><img src="{{ url('/data_file/'.$a->image) }}" class="t-img"></td>
								<td class="t-fullName">{{ $a->fullName }}</td>
								<td class="t-username">@ {{ $a->username }}</td>
								<td class="t-email">{{ $a->email }}</td>
								<td class="t-addBy">{{ $a->addBy }}</td>
								<td class="t-action">
									<a href=" ? id={{ $a->id }}" class="btn btn-success btn-action">Edit</a>
									<a href="/admin/manage/delete/{{ $a->id }}" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-action">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

				<div class="add-form">
					<p class="add-form-judul">Add Form</p>
					<form action="/admin/manage/add" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-side-right">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lastName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="firstName" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="file" name="file">
					</div>

					<button type="submit" class="btn btn-primary btn-submit">Add</button>
					

					</form>
				</div>
				<div class="edit-form">
						<p class="add-form-judul">Edit Form</p>
					<form action="/admin/manage/edit" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-side-right">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lastName" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label>ID</label>
						<input type="text" name="id" class="form-control" value="<?php echo $_GET['id']; ?>" required>
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="firstName" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="file" name="file">
					</div>

					<button type="submit" class="btn btn-primary btn-edit">Edit</button>
					

					</form>
				</div>
			

			


	</div>
@endsection
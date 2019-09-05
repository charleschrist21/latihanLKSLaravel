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
								<th class="t-judul">Title</th>
								<th class="t-judul">Category</th>
								<th class="t-judul">Location</th>
								<th class="t-judul">Photo By</th>
								<th class="t-judul">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($post as $a)
							
							<tr>
								<td>{{ $a->id }}</td>
								<td class=""><img src="{{ url('/data_file/'.$a->image) }}" class="t-img"></td>
								<td class="t-fullName">{{ $a->title }}</td>
								<td class="t-username">{{ $a->category }}</td>
								<td class="t-email">{{ $a->location }}</td>
								<td class="t-addBy">{{ $a->photoBy }}</td>
								<td class="t-action">
									<a href=" ? id={{ $a->id }}" class="btn btn-success btn-action">Edit</a>
									<a href="/post/manage/delete/{{ $a->id }}" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-action">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

				<div class="add-form">
					<p class="add-form-judul">Add Form</p>
					<form action="/post/manage/add" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-side-right">
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="category">
								<option value="Lomba Umum">Lomba Umum</option>
								<option value="Lomba Anak">Lomba Anak</option>
							</select>
						</div>
						<div class="form-group">
							<label>Photo By</label>
							<input type="text" name="photoBy" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Location</label>
						<input type="text" name="location" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="file" name="file">
					</div>

					<button type="submit" class="btn btn-primary btn-submit">Add</button>
					

					</form>
				</div>
				<div class="edit-form">
						<p class="add-form-judul">Edit Form</p>
					<form action="/post/manage/edit" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-side-right-post">	
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="category">
								<option value="Lomba Umum">Lomba Umum</option>
								<option value="Lomba Anak">Lomba Anak</option>
							</select>
						</div>
						<div class="form-group">
							<label>Photo By</label>
							<input type="text" name="photoBy" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" required></textarea>
						</div>
					</div>
					<div class="form-group">
							<label>ID</label>
							<input type="text" name="id" class="form-control" value="<?php echo $_GET['id']; ?>" required>
						</div>
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Location</label>
						<input type="text" name="location" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="file" name="file">
					</div>

					<button type="submit" class="btn btn-primary btn-edit-post">Edit</button>
					

					</form>
				</div>
			

			


	</div>
@endsection
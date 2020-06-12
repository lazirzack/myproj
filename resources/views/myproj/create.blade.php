@extends('myproj')
<?php
// resource/views/myproj
?>
@section('main')
<?php
// yield
?>
	<div class="row">
		<div class="col-md-8 offset-sm-2">
			<h2 class="display-6">Add New</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 offset-sm-2">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action='{{ url("/mydata") }}' method="post">
			@csrf
				<div class="form-group">
					<label for="name">Nama :</label>
					<input value="{{ old('name') }}" class="form-control" type="text" name="name" required>
					<label for="alamat">Alamat :</label>
					<textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
					<label for="email">Email :</label>
					<input value="{{ old('email') }}" class="form-control" type="text" name="email">
					<label for="notelp">No. Telp :</label>
					<input value="{{ old('notelp') }}" class="form-control" type="number" name="notelp">
				</div>
				<button type="submit" class="btn btn-primary">Save</button>
				<button type="reset" class="btn btn-warning">Reset</button>
				<a href='{{url("/")}}' class="btn btn-secondary">Cancel</a>
			</form>
		</div>
	</div>
@endsection

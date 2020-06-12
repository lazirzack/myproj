@extends('myproj')

@section('main')
<a href='{{ url("mydata/create") }}' class="btn btn-success mb-1">Add New</a>

@if(session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('success')}}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

	<div class="row"> 
		<form action='{{ url("/")}}' class="form-inline" method="GET"> 
			<div class="form-group mx-sm-3 mb-2"> 
				<input value="{{Request::get('keyword')}}" name="keyword" type="text" class="form-control" placeholder="Pencarian">
			</div>
			<div class="col-2">
				<button type="submit" class="btn btn-primary mb-2">Cari</button>
			</div>
			<div class="col-2">
				<a href='{{url("/")}}' class="btn btn-warning mb-2">Reset</a>
			</div>
		</form>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>No. Telp</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($mydata as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->alamat}}</td>
						<td>{{$item->email}}</td>
						<td>{{$item->notelp}}</td>
						<td>
							<a class="btn btn-primary" href='{{ url("mydata/{$item->id}/edit") }}' >Edit</a>
						<td>
							<form action='{{ url("mydata/{$item->id}") }}' method="post">
							@csrf
							@method('DELETE')
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
@extends('base')

@section('title', 'User')
@section('menu', 'user')
@section('add_btn')<a href="{{ route('tambah_user') }}" class="btn btn-success" style="float:left;margin-right:4px;">Tambah</a>@stop
@section('content')
<div class="table-content">
	<h3>User</h3>
	<hr>
	<form method="post" action="{{ route('action_del_user') }}">
		@csrf
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th class="tb-no">No</th>
					<th>Username</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($user as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->username }}</td>
					<td>
						<a href="{{ url('tambah_user/'.$item->id_user) }}" class="btn btn-primary btn-xs">Edit</a>
						<button type="submit" class="btn btn-danger btn-xs" name="del" value="{{ $item->id_user }}">Hapus</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</form>
	<div class="clear"></div>
</div>
@stop
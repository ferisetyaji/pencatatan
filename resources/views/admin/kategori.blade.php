@extends('base')

@section('title', 'Kategori')
@section('menu', 'kategori')
@section('add_btn')<a href="{{ route('tambah_kategori') }}" class="btn btn-success" style="float:left;margin-right:4px;">Tambah</a>@stop
@section('content')
<div class="table-content">
	<h3>kategori</h3>
	<hr>
	<form method="post" action="{{ route('action_del_kategori') }}">
		@csrf
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th class="tb-no">No</th>
					<th>Nama kategori</th>
					<th>Tipe</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($kategori as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->nama_kategori }}</td>
					<td>{{ $item->tipe }}</td>
					<td>{{ $item->deskripsi_kategori }}</td>
					<td>
						<a href="{{ url('edit_kategori/'.$item->id) }}" class="btn btn-primary btn-xs">Edit</a>
						<button type="submit" class="btn btn-danger btn-xs" name="del" value="{{ $item->id }}">Hapus</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</form>
	<div class="clear"></div>
</div>
@stop
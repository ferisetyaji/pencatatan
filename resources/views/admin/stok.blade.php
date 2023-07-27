@extends('base')

@section('title', 'Stok')
@section('menu', 'stok')
@section('add_btn')<a href="{{ route('tambah_stok') }}" class="btn btn-success" style="float:left;margin-right:4px;">Tambah</a>@stop
@section('content')
<div class="table-content">
	<h3>Stok</h3>
	<hr>
	<form method="post">
		@csrf
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th class="tb-no">No</th>
					<th>Nama Stok</th>
					<th>Harga</th>
					<th>Kategori</th>
					<th>Jumlah Stok</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($stok as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->nama }}</td>
					<td>{{ $item->harga }}</td>
					<td>{{ $item->kategori }}</td>
					<td>{{ $item->jumlah_stok }}</td>
					<td>
						<a href="{{ url('admin/edit_stok/'.$item->id) }}" class="btn btn-primary btn-xs">Edit</a>
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
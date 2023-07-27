@extends('base')

@section('title', 'Slide')
@section('menu', 'slide')
@section('add_btn')<a href="{{ route('tambah_slide') }}" class="btn btn-success" style="float:left;margin-right:4px;">Tambah</a>@stop
@section('content')
<div class="table-content">
	<h3>slide</h3>
	<hr>
	<form method="post">
		@csrf
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th class="tb-no">No</th>
					<th>Gambar</th>
					<th>Link</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($slide as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td><img src="{{ asset('media/'.$item->gambar)}}" style="width:100px"></td>
					<td>{{ $item->link }}</td>
					<td>
						<a href="{{ url('admin/edit_slide/'.$item->id) }}" class="btn btn-primary btn-xs">Edit</a>
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
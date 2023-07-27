@extends('base')

@section('title', 'Transaksi')
@section('menu', 'transaksi')
@section('add_btn')<a href="{{ route('tambah_transaksi') }}" class="btn btn-success" style="float:left;margin-right:4px;">Tambah</a>@stop
@section('content')
<div class="table-content">
	<h3>Transaksi</h3>
	<hr>
	<form method="get" action="{{ route('transaksi') }}">
		@csrf
		<div class="form-group">
			<div style="float:left;">Start : </div><input type="date" class="form-control" name="dari" value="{{ isset($dari) ? $dari:'' }}" style="float:left;width:auto;margin-right:5px">
			<div style="float:left;">End : </div><input type="date" class="form-control" name="ke" value="{{ isset($ke) ? $ke:'' }}" style="float:left;width:auto;margin-right:5px;">
			<button type="submit" class="btn btn-primary">Filter</button>
			<div class="clearfix"></div>
		</div>
	</form>
	<form method="post" action="{{ route('action_del_transaksi') }}">
		@csrf
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th class="tb-no">No</th>
					<th>Tanggal</th>
					<th>Jenis Transaksi</th>
					<th>Kategori</th>
					<th>Nominal</th>
					<th>Deskripsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($transaksi as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
					<td>{{ $item->jenis_transaksi }}</td>
					<td>{{ $item->nama_kategori }}</td>
					<td>Rp. {{ number_format($item->nominal) }}</td>
					<td>{{ $item->deskripsi }}</td>
					<td>
						<a href="{{ url('edit_transaksi/'.$item->id) }}" class="btn btn-primary btn-xs">Edit</a>
						<button type="submit" class="btn btn-danger btn-xs" name="del" value="{{ $item->id }}">Hapus</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</form>
	<div class="clear"></div>
	<h5>Jumlah Saldo : Rp. {{isset($saldo) ? number_format($saldo): 0}}</h5>
</div>
@stop
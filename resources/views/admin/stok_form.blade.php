@extends('base')

@section('title', 'Stok')
@section('menu', 'stok')
@section('content')
<div class="table-content">
	<h3>{{$title}}Stok</h3>
	<hr>
	<form method="post" action="{{ route($action_url) }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-8">
				<div class="form-group row">
					<label class="col-md-4">Nama</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="nama" value="{{isset($stok->nama) ? $stok->nama: ''}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Deskripsi</label>
					<div class="col-md-8">
						<textarea class="form-control" name="deskripsi">{{isset($stok->deskripsi) ? $stok->deskripsi: ''}}</textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Harga</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="harga" value="{{isset($stok->harga) ? $stok->harga: ''}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Kategori</label>
					<div class="col-md-8">
						<select class="form-control" name="kategori">
							<option value="">- Pilih Kategori -</option>
							@foreach($katagori as $item)
							<option{{ isset($stok->id_kategori) && $stok->id_kategori == $item->id ? ' selected': ''  }} value="{{$item->id}}">{{ $item->nama }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Jumlah Stok</label>
					<div class="col-md-8">
						<input type="number" class="form-control" name="jumlah" value="{{isset($stok->jumlah_stok) ? $stok->jumlah_stok: ''}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Gambar</label>
					<div class="col-md-8">
						<input type="file" class="form-control" name="gambar">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4"></label>
					<div class="col-md-8">
						<input type="hidden" name="id" value="{{isset($stok->id) ? $stok->id: ''}}">
						<button type="submit" class="btn btn-success" name="save" value="1">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop
@extends('base')

@section('title', 'Kategori')
@section('menu', 'kategori')
@section('content')
<div class="table-content">
	<h3>{{$title}}Kategori</h3>
	<hr>
	@error('nama_kategori')
    <div class="alert alert-danger">{{ $message}}</div>
	@enderror
	@error('deskripsi_kategori')
    <div class="alert alert-danger">{{ $message}}</div>
	@enderror
	<form method="post" action="{{ route($action_url) }}">
		@csrf
		<div class="row">
			<div class="col-md-8">
				<div class="form-group row">
					<label class="col-md-4">Nama</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="nama_kategori" value="{{isset($kategori->nama_kategori) ? $kategori->nama_kategori: ''}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Deskripsi</label>
					<div class="col-md-8">
						<textarea class="form-control" name="deskripsi_kategori" style="resize:vertical;">{{isset($kategori->deskripsi_kategori) ? $kategori->deskripsi_kategori: ''}}</textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Tipe kategori</label>
					<div class="col-md-8">
						<div class="radio">
						  <label>
						    <input type="radio" name="tipe" id="optionsRadios1" value="Pemasukan"{{isset($kategori->tipe) && $kategori->tipe == 'Pemasukan' ? ' checked': ' checked'}}>
						    Pemasukan
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="tipe" id="optionsRadios2" value="Pengeluaran"{{isset($kategori->tipe) && $kategori->tipe == 'Pengeluaran' ? ' checked': ''}}>
						    Pengeluaran
						  </label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4"></label>
					<div class="col-md-8">
						<input type="hidden" name="id" value="{{isset($kategori->id) ? $kategori->id: ''}}">
						<button type="submit" class="btn btn-success" name="save" value="1">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop
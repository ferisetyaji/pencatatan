@extends('base')

@section('title', 'Transkasi')
@section('menu', 'transaksi')
@section('content')
<div class="table-content">
	<h3>{{$title}}Transkasi</h3>
	<hr>
	@error('nominal')
    <div class="alert alert-danger">{{ $message}}</div>
	@enderror
	@error('deskripsi')
    <div class="alert alert-danger">{{ $message}}</div>
	@enderror
	<form method="post" action="{{ route($action_url) }}">
		@csrf
		<div class="row">
			<div class="col-md-8">
				<div class="form-group row">
					<label class="col-md-4">Jenis transkasi</label>
					<div class="col-md-8">
						<div class="radio">
						  <label>
						    <input type="radio" name="jenis_transaksi" id="optionsRadios1" class="jenis-transaksi" value="Pemasukan"{{isset($transkasi->tipe) && $transkasi->jenis_transaksi == 'Pemasukan' ? ' checked': ' checked'}}>
						    Pemasukan
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="jenis_transaksi" id="optionsRadios2" class="jenis-transaksi" value="Pengeluaran"{{isset($transkasi->tipe) && $transkasi->jenis_transaksi == 'Pengeluaran' ? ' checked': ''}}>
						    Pengeluaran
						  </label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Kategori</label>
					<div class="col-md-8">
						<select class="form-control" name="kategori" id="list-kategori">
							@foreach($kategori as $k_item)
							<option{{ !empty($kategori_select) && $k_item->id == $transaksi->id_kateogri ? ' selected': '' }} value="{{$k_item->id}}">{{$k_item->nama_kategori}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Nominal</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="nominal" value="{{isset($transaksi->nominal) ? $transaksi->nominal: ''}}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4">Deskripsi</label>
					<div class="col-md-8">
						<textarea class="form-control" name="deskripsi">{{isset($transaksi->deskripsi) ? $transaksi->deskripsi: ''}}</textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4"></label>
					<div class="col-md-8">
						<input type="hidden" name="id" value="{{isset($transkasi->id) ? $transkasi->id: ''}}">
						<button type="submit" class="btn btn-success" name="save" value="1">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop
@section('jscp')

$('.jenis-transaksi').click(function(){
	var tipe = $(this).val();

	$.ajax({
		url: '{{ route('data_kategori') }}',
		type: 'post',
		data: {
			tipe:tipe,
			 _token: $('input[name="_token"]').val()
		},
		success: function(data){
			var item = '';
			for(var i = 0; i < data.length; i++){
				item += '<option value="'+data[i].id+'">'+data[i].nama_kategori+'</option>'
			}

			$('#list-kategori').html(item);
		}
	});
});

@stop
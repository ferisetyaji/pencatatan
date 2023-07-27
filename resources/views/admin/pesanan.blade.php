@extends('base')

@section('title', 'Pesanan')
@section('menu', 'pesanan')
@section('content')
<style type="text/css">
    .rating{
        font-size:1.2em;
        display:inline-block;
    }
    .rating-s i{
        color:orange;
    }
</style>
<div class="table-content">
	<h3>Pesanan</h3>
	<hr>
	<form method="post" action="{{ route('action_pesanan') }}">
		@csrf
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th class="tb-no">No</th>
					<th>Nama Pemesan</th>
					<th>Status Pemesanan</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Subtotal</th>
					<th>Rating</th>
					<th>ULasan</th>
					<th>Tanggal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			@foreach($pesanan as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->nama_pemesan }}</td>
					<td>{{ $item->status_pesanan }}</td>
					<td>{{ $item->jumlah }}</td>
					<td>{{ $item->harga }}</td>
					<td>{{ $item->subtotal }}</td>
					<td>
					@if($item->rating == 1)
						<span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                @elseif($item->rating == 2)
	                	<span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                @elseif($item->rating == 3)
	                	<span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                @elseif($item->rating == 4)
	                	<span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating"><i class="fas fa-star"></i></span>
	                @elseif($item->rating == 5)
	                	<span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                    <span class="rating rating-s"><i class="fas fa-star"></i></span>
	                @endif
					</td>
					<td>{{ $item->komentar }}</td>
					<td>{{ $item->tanggal }}</td>
					<td>
						@if($item->status_pesanan == 'pesanan_belum_diproses')
						<button type="submit" class="btn btn-primary btn-xs" name="kirim" value="{{ $item->id }}" style="margin-right:4px;">Kirim</button>
						@elseif($item->status_pesanan == 'pesanan_dikirim')
						<button type="submit" class="btn btn-primary btn-xs" name="terkirim" value="{{ $item->id }}" style="margin-right:4px;">Terkirim</button>
						@endif

						@if($item->status_pesanan != 'pesanan_selesai')
						<button type="submit" class="btn btn-danger btn-xs" name="batal" value="{{ $item->id }}">Batal</button>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</form>
	<div class="clear"></div>
</div>
@stop
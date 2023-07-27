@extends('base')

@section('title', 'Home')
@section('menu', 'home')
@section('content')

<h3>Home</h3>
<hr>
<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Saldo saat ini</div>
				<div class="content-panel-c">Rp. {{isset($saldo) ? number_format($saldo): 0}}</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Total pengeluaran</div>
				<div class="content-panel-c">Rp. {{isset($pemasukan) ? number_format($pemasukan): 0}}</div>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default dash-panel-c">
			<div class="panel-body">
				<div class="title-panel-c">Total pemasukan</div>
				<div class="content-panel-c">Rp. {{isset($pengeluaran) ? number_format($pengeluaran): 0}}</div>
			</div>
		</div>
	</div>
</div>

@stop
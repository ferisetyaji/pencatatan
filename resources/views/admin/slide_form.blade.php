@extends('base')

@section('title', 'Tambah Slide')
@section('menu', 'slide')
@section('content')
<div class="table-content">
	<h3>{{$title}}slide</h3>
	<hr>
	<form method="post" action="{{ route($action_url) }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-8">
				<div class="form-group row">
					<label class="col-md-4">Link</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="link" value="{{isset($slide->link) ? $slide->link: ''}}">
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
						<input type="hidden" name="id" value="{{isset($slide->id) ? $slide->id: ''}}">
						<button type="submit" class="btn btn-success" name="save" value="1">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop
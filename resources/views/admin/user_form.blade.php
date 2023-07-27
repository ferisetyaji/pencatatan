@extends('base')

@section('title', 'Tambah User')
@section('menu', 'user')
@section('content')
<div class="table-content">
	<h3>{{ $title }}</h3>
	<hr>
	<form method="post" action="{{ route($action_url) }}">
		@csrf
		<div class="row">
			<div class="col-md-8">
				<div class="form-group row">
					<label class="col-md-2">Username</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="username" value="{{ isset($user->username) ? $user->username: '' }}">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2">Password</label>
					<div class="col-md-10">
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2"></label>
					<div class="col-md-10">
						<input type="hidden" name="id_user" value="{{isset($user->id) ? $user->id: ''}}">
						<button type="submit" class="btn btn-success" name="save" value="1">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop
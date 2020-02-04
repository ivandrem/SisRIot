@extends('layouts.app')

@section('title', 'Editar perfil')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('profile.show'), 'text'=>'Mi perfil'],
			['href'=>route('profile.edit'), 'text'=>'Actualización'],
			['href'=>route('profile.editPassword'), 'text'=>'Contraseña', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	<div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('profile.editPassword') }}" class="btn btn-secondary"><i class='fas fa-retweet'></i></a>
			</div>
		</div>
	</div>
	{!! Form::open(['id'=>'passwordForm', 'method'=>'PATCH', 'url'=>route('profile.updatePassword'), 'autocomplete'=>'off']) !!}
		<div class="row my-2">
			<div class="col-sm-2"><label class="font-weight-bold">Contraseña actual</label></div>
			<div class="col-sm-8"><input type="password" class="form-control" name="password" value="" placeholder="Ingrese su contraseña actual" required autofocus></div>
		</div>
		<div class="row my-2">
			<div class="col-sm-2"><label class="font-weight-bold">Nueva contraseña</label></div>
			<div class="col-sm-8"><input type="password" class="form-control" name="new-password" value="" placeholder="Ingrese su nueva contraseña" required></div>
		</div>
		<div class="row my-2">
			<div class="col-sm-2"><label class="font-weight-bold">Confirme la nueva contraseña</label></div>
			<div class="col-sm-8"><input type="password" class="form-control" name="confirm-new-password" value="" placeholder="Confirme su nueva contraseña" required></div>
		</div>
		<div class="row my-4">
			<div class="offset-sm-2 col-sm-8">
				<input type="submit" class="btn btn-primary" value="Actualizar">
			</div>
		</div>
		<hr>
	{!! Form::close() !!}
	<div class="row">
		<div class="col text-right">
			<a href="{{ route('profile.edit') }}" class="btn btn-link">Cancelar</a>
		</div>
	</div>
@endsection
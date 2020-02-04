@extends('layouts.app')

@section('title', 'Editar perfil')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('profile.show'), 'text'=>'Mi perfil'],
			['href'=>route('profile.edit'), 'text'=>'Actualización', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	<div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('profile.editPassword') }}" class="btn btn-secondary"><i class='fas fa-key'></i></a>
			</div>
			<div class="btn-group mr" role="group" aria-label="">
				<a href="{{ route('profile.edit') }}" class="btn btn-secondary"><i class='fas fa-retweet'></i></a>
			</div>
		</div>
	</div>
	{!! Form::open(['id'=>'profileForm', 'method'=>'PUT', 'url'=>route('profile.update')]) !!}
		<div class="row">
			<div class="col-sm-2"><label class="font-weight-bold">D.N.I.</label></div>
			<div class="col-sm-10"><p>{{ auth()->user()->dni }}</p></div>
		</div>
		<div class="row my-2">
			<div class="col-sm-2"><label class="font-weight-bold">Nombre completo</label></div>
			<div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="Ingrese su nombre" autofocus></div>
		</div>
		<div class="row my-2">
			<div class="col-sm-2"><label class="font-weight-bold">Email</label></div>
			<div class="col-sm-8"><input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" placeholder="Ingrese su email"></div>
		</div>
		<div class="row my-2">
			<div class="col-sm-2"><label class="font-weight-bold">Teléfono</label></div>
			<div class="col-sm-8"><input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}" placeholder="Ingrese su teléfono"></div>
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
			<a href="{{ route('profile.show') }}" class="btn btn-link">Cancelar</a>
		</div>
	</div>
@endsection
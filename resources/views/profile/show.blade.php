@extends('layouts.app')

@section('title', 'Mi perfil')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('profile.show'), 'text'=>'Mi perfil', 'active'=>true]
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
				<a href="{{ route('profile.edit') }}" class="btn btn-secondary"><i class='fas fa-pencil-alt'></i></a>
			</div>
		</div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">D.N.I.</label></div>
		<div class="col-sm-10"><p>{{ auth()->user()->dni }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Nombre completo</label></div>
		<div class="col-sm-10"><p>{{ auth()->user()->name }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Email</label></div>
		<div class="col-sm-10"><p>{{ auth()->user()->email }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Teléfono</label></div>
		<div class="col-sm-10">
			@if(auth()->user()->hasPhone())
				<p>{{ auth()->user()->phone }}</p>
			@else
				<label class="text-muted">No disponible</label>
			@endif
		</div>
	</div>
	<hr>
	<div class="row mb-2">
		<div class="col text-right">
			<a href="{{ route('profile.show') }}" class="btn btn-link">Recargar página</a>
		</div>
	</div>
@endsection
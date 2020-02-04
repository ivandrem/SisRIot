@extends('layouts.app')

@section('title', 'Nuevo Rol')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Roles'],
			['href'=>route('roles.create'), 'text'=>'Nuevo', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	@include('roles.includes.form')
@endsection
@extends('layouts.app')

@section('title', 'Nuevo Usuario')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('users.index'), 'text'=>'Usuarios'],
			['href'=>route('users.create'), 'text'=>'Nuevo', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	@include('users.includes.form')
@endsection
@extends('layouts.app')

@section('title', 'Nueva Planta')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('plantas.index'), 'text'=>'Plantas'],
			['href'=>route('plantas.create'), 'text'=>'Nueva', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	@include('plantas.includes.form')
@endsection
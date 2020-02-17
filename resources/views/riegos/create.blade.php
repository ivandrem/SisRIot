@extends('layouts.app')

@section('title', 'Nueva Riego')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('riegos.index'), 'text'=>'Riegos'],
			['href'=>route('riegos.create'), 'text'=>'Nueva', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	@include('riegos.includes.form')
@endsection
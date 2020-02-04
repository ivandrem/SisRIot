@extends('layouts.app')

@section('title', 'Nueva Parcela')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('parcelas.index'), 'text'=>'Parcelas'],
			['href'=>route('parcelas.create'), 'text'=>'Nueva', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	@include('parcelas.includes.form')
@endsection
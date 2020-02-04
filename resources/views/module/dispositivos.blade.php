@extends('layouts.app')

@section('title', 'Dispositivos')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Dispositivos', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')

<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="\images\home\esp32.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">ESP32</h5>
    </div>

      <a href="#" class="btn btn-primary">Comprobar estado</a>
    <div class="card-footer">

      <small class="text-muted">Conectado</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" class="col-12 col-sm-6 col-md-4 col-lg-4" src="\images\home\dht11.jpg" alt="Card image cap">
    <div class="card-body">

      <h5 class="card-title">Sensor Humedad/Temperatura</h5>
    </div>
    	  <a href="#" class="btn btn-primary">Comprobar estado</a>
    <div class="card-footer">
      <small class="text-muted">Conectado</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="\images\home\humedad_suelo.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Sensor Humedad Suelo</h5>
    </div>
    	  <a href="#" class="btn btn-primary">Comprobar estado</a>
    <div class="card-footer">
      <small class="text-muted">Conectado</small>
    </div>
  </div>
</div>

@endsection
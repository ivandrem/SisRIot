@extends('layouts.app')

@section('title', 'Inicio')

@section('mainTagClass', '')

@push('links')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/home-gallery.css') }}">
@endpush

@section('footer','')

@section('content')
  <div id="home-gallery" class="row no-gutters justify-content-center">
    <div class="col-12 col-sm-6 col-md-4 col-lg-4" style="background-image: url('{{ asset('images/home/slide-01.jpg') }}');">
      <div class="position-absolute p-3">
        <h3 class="text-white">Parcelas</h3>
        <a class="btn text-light" href="#parcelas">Ir al módulo</a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4" style="background-image: url('{{ asset('images/home/slide-02.jpg') }}');">
      <div class="position-absolute p-3">
        <h3 class="text-white">Riego</h3>
        <a class="btn text-light" href="#riego">Ir al módulo</a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4" style="background-image: url('{{ asset('images/home/slide-03.jpg') }}');">
      <div class="position-absolute p-3">
        <h3 class="text-white">Plantas</h3>
        <a class="btn text-light" href="#plantas">Ir al módulo</a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="background-image: url('{{ asset('images/home/slide-04.jpg') }}');">
      <div class="position-absolute p-3">
        <h3 class="text-white">Monitoreo</h3>
        <a class="btn text-light" href="#monitoreo">Ir al módulo</a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="background-image: url('{{ asset('images/home/slide-05.jpg') }}');">
      <div class="position-absolute p-3">
        <h3 class="text-white">Dispositivos</h3>
        <a class="btn text-light" href="#dispositivos">Ir al módulo</a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="background-image: url('{{ asset('images/home/slide-06.jpg') }}');">
      <div class="position-absolute p-3">
        <img src="{{ asset('images/auth.png') }}" class="float-right" style="height:70px;">
        <h3 class="text-white">Usuarios</h3>
        <a class="btn text-light" href="{{ route('users.index') }}">Ir al módulo</a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="background-image: url('{{ asset('images/home/slide-07.jpg') }}');">
      <div class="position-absolute p-3">
        <img src="{{ asset('images/roles.png') }}" class="float-right" style="height:70px;">
        <h3 class="text-white">Roles</h3>
        <a class="btn text-light" href="{{ route('roles.index') }}">Ir al módulo</a>
      </div>
    </div>
  </div>
@endsection
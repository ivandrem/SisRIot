@extends('layouts.app')

@section('title', 'Permisos')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Roles'],
			['href'=>route('roles.show',['role'=>$role]), 'text'=>$role->name],
			['href'=>route('roles.edit',['role'=>$role]), 'text'=>'Actualización'],
			['href'=>route('roles.editPermissions',['role'=>$role]), 'text'=>'Permisos', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
    <h4>Administración de permisos Rol</h4><br>
	{!! Form::open(['method'=>'PUT', 'url'=>route('roles.updatePermissions', ['role'=>$role])]) !!}
		{{ Form::token() }}
		@include('roles.includes.select-permissions')
		<div class="row justify-content-end">
    		<div class="col-sm-10">
    			{{ Form::submit('Guardar',['class'=>'btn btn-primary']) }}
                {{ link_to(route('roles.index'), 'Cancelar', ['class'=>'btn btn-light']) }}
            </div>
    	</div>
	{!! Form::close() !!}
@endsection
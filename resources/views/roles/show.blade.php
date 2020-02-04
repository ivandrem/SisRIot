@extends('layouts.app')

@section('title', 'Visualización de Rol')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Roles'],
			['href'=>route('roles.show',['role'=>$role]), 'text'=>$role->name, 'active'=>true]
		]
	])
	@endcomponent
	<div class="row mb-2">
		<div class="col text-right">
			@can('roles.edit')
				<div class="btn-group mr-2" role="group" aria-label="">
					<a href="{{ route('roles.edit',['role'=>$role]) }}" class="btn btn-secondary"><i class='fas fa-pencil-alt'></i></a>
				</div>
			@endcan
			@can('roles.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deleteRole({{ $role->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-role-{{ $role->id }}" method="POST" action="{{ route('roles.destroy',['role' => $role->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2"><label class="font-weight-bold">Nombre</label></div>
		<div class="col-sm-10"><p>{{ $role->name }}</p></div>
	</div>
	<div class="row">
		<div class="col-sm-2"><label class="font-weight-bold">Nombre clave</label></div>
		<div class="col-sm-10"><p>{{ $role->slug }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Permisos</label></div>
		<div class="col-sm-10">
			@switch($role->special)
				@case ('all-access') <p>Acceso total</p> @break;
				@case ('no-access') <p>Ningun permiso</p>  @break;
				@default
					<p class="rounded py-2 px-3 text-white bg-secondary">
						@forelse ($role->permissions as $permission)
							{{ $permission->name }}<br>
						@empty
							Ningun permiso
						@endforelse 
					</p>
			@endswitch
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2"><label class="font-weight-bold">Descripción</label></div>
		<div class="col-sm-10"><p>{{ $role->description }}</p></div>
	</div>
	<hr>
	<div class="row justify-content-center">
		<div class="col-6 text-left">
			<a href="{{ route('roles.index') }}" class="btn btn-light">Regresar</a>
		</div>
		<div class="col-6 text-right">
			<a href="{{ route('roles.show',['role'=>$role]) }}" class="btn btn-light">Recargar</a>
		</div>
	</div>
@endsection

@push('scripts')
	@include('roles.includes.delete-role')
@endpush
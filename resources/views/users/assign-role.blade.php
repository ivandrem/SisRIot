@extends('layouts.app')

@section('title', 'Asignación de Rol')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('users.index'), 'text'=>'Usuarios'],
			['href'=>route('users.show',['user'=>$user]), 'text'=>$user->name],
			['href'=>route('users.edit',['user'=>$user]), 'text'=>'Actualización'],
			['href'=>route('users.assignRole',['user'=>$user]), 'text'=>'Asignación de Rol', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
    <div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('users.assignRole',['user'=>$user]) }}" class="btn btn-secondary"><i class='fas fa-redo'></i></a>
			</div>
		</div>
	</div>
	<h4 class="mb-5">Seleccione un rol de usuario</h4>
	{!! Form::open(['id'=>'userForm', 'method'=>'PATCH', 'url'=>route('users.updateAssignedRole', ['user'=>$user])]) !!}
		<div class="form-group row">
            {{ Form::label('role', 'Rol', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
            	@php
					use Caffeinated\Shinobi\Models\Permission;

				@endphp
                <select name="role" class="form-control" placeholder="Seleccione un rol" title="Seleccione un rol" autofocus>
                	<option value="">Ninguno</option>
                	@foreach($roles as $role)
                		@php
                			$permissions = '';

                			switch($role->special)
                			{
                				case 'all-access': $permissions = 'Acceso total'; break;
                				case 'no-access': $permissions = 'Sin permisos'; break;
                				default:
                					if(count($role->permissions)>0)
                					{
	                					foreach($role->permissions as $permission)
			                			{
			                				$permissions .= $permission->name.'. ';
			                			}
		                			}
		                			else{$permissions = 'Sin permisos';}
                			}
                		@endphp
                		<option value="{{ $role->slug }}" title="{{ $permissions }}" @if($user->hasRole($role->slug)) selected @endif>{{ $role->name }}</option>
                	@endforeach
                </select>
            </div>
        </div>
		<div class="row justify-content-end">
    		<div class="col-sm-10">
    			{{ Form::submit('Guardar',['class'=>'btn btn-primary']) }}
                @php
                    if(url()->previous() == url()->current()){$cancel_route = route('users.index');}
                    else{$cancel_route = url()->previous();}
                @endphp
                {{ link_to($cancel_route, 'Cancelar', ['class'=>'btn btn-light']) }}
            </div>
    	</div>
    {!! Form::close() !!}
@endsection
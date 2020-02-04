@extends('layouts.app')

@section('title', 'Visualización de Usuario')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('users.index'), 'text'=>'Usuarios'],
			['href'=>route('users.show',['user'=>$user]), 'text'=>$user->name, 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	<div class="row mb-2">
		<div class="col text-right">
			@can('users.resetPassword')
				<div class="btn-group mr-2" role="group" aria-label="">
					<a href="javascript:resetPassword({{ $user->id }});" class="btn btn-secondary"><i class='fas fa-key'></i></a>
					<form id="reset-password-{{ $user->id }}" method="POST" action="{{ route('users.resetPassword', ['user' => $user->id]) }}">
						@csrf
						@method('PATCH')
					</form>
				</div>
			@endcan
			@can('users.assignRole')
				<div class="btn-group mr-2" role="group" aria-label="">
					<a class="btn btn-secondary" href="{{ route('users.assignRole', ['user' => $user->id]) }}"><i class='fas fa-user-tag'></i></a>
				</div>
			@endcan
			@can('users.edit')
				<div class="btn-group mr-2" role="group" aria-label="">
					<a href="{{ route('users.edit', ['user'=>$user->id]) }}" class="btn btn-secondary"><i class='fas fa-pencil-alt'></i></a>
				</div>
			@endcan
			@can('users.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deleteUser({{ $user->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-user-{{ $user->id }}" method="POST" action="{{ route('users.destroy', ['user'=>$user->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Estado</label></div>
		<div class="col-sm-10">
			@if($user->hasEditableRole() && Gate::check('users.editState'))
				{!! Form::open(['id'=>'change-state-'.$user->id, 'method'=>'PATCH', 'url'=>route('users.updateState', ['user' => $user->id])]) !!}
					<div class="custom-control custom-switch">
						<input name="state" id="customSwitch-{{ $user->id }}" type="checkbox" {{ $user->enabled ? 'checked' : '' }} class="custom-control-input" onchange="changeState('{{ 'change-state-'.$user->id }}');">
						<label for="customSwitch-{{ $user->id }}" class="custom-control-label">{{ $user->enabled ? 'Habilitado' : 'Deshabilitado' }}</label>
					</div>
				{!! Form::close() !!}
			@else
				<p>{{ $user->enabled ? 'Habilitado' : 'Deshabilitado' }}</p>
			@endif
		</div>
	</div>
	<hr>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">D.N.I.</label></div>
		<div class="col-sm-10"><p>{{ $user->dni }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Nombre completo</label></div>
		<div class="col-sm-10"><p>{{ $user->name }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Email</label></div>
		<div class="col-sm-10"><p>{{ $user->email }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Teléfono</label></div>
		<div class="col-sm-10">
			@if($user->hasPhone())
				<p>{{ $user->phone }}</p>
			@else
				<label class="text-muted">No disponible</label>
			@endif
		</div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Rol</label></div>
		<div class="col-sm-10">
			@forelse($user->roles as $role)
				<label>{{ $role->name }}</label>
			@empty
				<label class="text-muted">No definido</label>
			@endforelse
		</div>
	</div>
	<hr>
	<div class="row mb-2">
		<div class="col text-right">
			<a href="{{ route('users.show', ['user'=>$user->id]) }}" class="btn btn-link">Recargar página</a>
		</div>
	</div>
@endsection

@push('scripts')
	@include('users.includes.delete-user')
	@include('users.includes.reset-password')
	@include('users.includes.change-state')
@endpush
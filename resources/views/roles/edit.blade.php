@extends('layouts.app')

@section('title', 'Actualización de Rol')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Roles'],
			['href'=>route('roles.show',['role'=>$role]), 'text'=>$role->name],
			['href'=>route('roles.edit',['role'=>$role]), 'text'=>'Actualización', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	<div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('roles.edit',['role'=>$role]) }}" class="btn btn-secondary"><i class='fas fa-redo'></i></a>
			</div>
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
	@include('roles.includes.form', $role)
@endsection

@push('scripts')
	@include('roles.includes.delete-role')
@endpush
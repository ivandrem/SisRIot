@extends('layouts.app')

@section('title', 'Roles de usuarios')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Roles', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	<div class="float-right">
		<a class="btn" href="{{ route('roles.index') }}">Recargar página</a>
	</div>
	@can('roles.create') <a class="btn btn-primary" href="{{ route('roles.create') }}">Nuevo registro</a> @endcan
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Lista de Roles</caption>
			<thead class="thead-light">
				<tr>
					<th>Rol</th>
					<th>Nombre clave</th>
					<th>Descripción</th>
					<th>Permisos</th>
					<th>Creación</th>
					<th>Última actualización</th>
					@if(Gate::check('roles.show') || Gate::check('roles.edit') || Gate::check('roles.destroy'))
						<th>Acciones</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@forelse($roles as $role)
					<tr ondblclick="window.location='{{ route('roles.show', ['role' => $role->id]) }}';" title="Presione doble click para cargar el registro">
						<td>{{ $role->name }}</td>
						<td>
							@if($role->editable)
								{{ $role->slug }}
							@else
								<label class="text-muted">...</label>
							@endif
						</td>
						<td>{{ $role->description }}</td>
						<td>
							@php
								switch($role->special)
								{
									case 'all-access': $permissions='Acceso total'; break;
									case 'no-access': $permissions='Ningun permiso'; break;
									default: $permissions='Personalizados';
								}
							@endphp
							@if($role->editable && Gate::check('roles.edit'))
								<a href="{{ route('roles.editPermissions', ['role' => $role->id]) }}" title="ver permisos">
									{{ $permissions }}
								</a>
							@else
								{{ $permissions }}
							@endcannot
						</td>
						<td>{{ $role->created_at }}</td>
						<td>{{ $role->updated_at }}</td>
						@if(Gate::check('roles.show') || Gate::check('roles.edit') || Gate::check('roles.destroy'))
						<td>
							@if($role->editable)
								<div class="btn-group">
									<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
									<div class="dropdown-menu dropdown-menu-right">
										@can('roles.show') <a class="dropdown-item" href="{{ route('roles.show', ['role' => $role->id]) }}">Abrir</a> @endcan
										@can('roles.edit') <a class="dropdown-item" href="{{ route('roles.edit', ['role' => $role->id]) }}">Editar</a> @endcan
										@can('roles.destroy')
											<a class="dropdown-item" href="javascript:deleteRole({{ $role->id }});">Eliminar</a>
											<form id="delete-role-{{ $role->id }}" method="POST" action="{{ route('roles.destroy',['role' => $role->id]) }}">
												@csrf
												@method('DELETE')
											</form>
										@endcan
									</div>
								</div>
							@else
								<label class="text-muted">No disponible</label>
							@endif
						</td>
						@endif
					</tr>
				@empty
					<tr>
						<td colspan="7">No se encontraron registros</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		{{ $roles->links() }}
	</div>
@endsection

@push('scripts')
	@include('roles.includes.delete-role')
@endpush
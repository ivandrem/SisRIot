@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('users.index'), 'text'=>'Usuarios', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	<div class="float-right">
		<a class="btn" href="{{ route('users.index') }}">Recargar página</a>
	</div>
	@can('users.create') <a class="btn btn-primary" href="{{ route('users.create') }}">Nuevo registro</a> @endcan
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Lista de Usuarios</caption>
			<thead class="thead-light">
				<tr>
					<th>DNI</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Estado</th>
					<th>Rol</th>
					<th>Creación</th>
					<th>Última actualización</th>
					@if(Gate::check('users.show') || Gate::check('users.edit') || Gate::check('users.destroy'))
						<th>Acciones</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@forelse($users as $user)
					<tr ondblclick="window.location='{{ route('users.show', ['user' => $user->id]) }}';" title="Presione doble click para cargar el registro">
						<td>{{ $user->hasEditableRole() ? $user->dni : '...' }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							@if($user->hasPhone())
								{{ $user->phone }}
							@else
								<label class="text-muted">No definido</label>
							@endif
						</td>
						<td>
							@if($user->hasEditableRole() && Gate::check('users.editState'))
								{!! Form::open(['id'=>'change-state-'.$user->id, 'method'=>'PATCH', 'url'=>route('users.updateState', ['user' => $user->id])]) !!}
									<div class="custom-control custom-switch">
										<input name="state" id="customSwitch-{{ $user->id }}" type="checkbox" {{ $user->enabled ? 'checked' : '' }} class="custom-control-input" onchange="changeState('{{ 'change-state-'.$user->id }}');">
										<label for="customSwitch-{{ $user->id }}" class="custom-control-label">{{ $user->enabled ? 'Habilitado' : 'Deshabilitado' }}</label>
									</div>
								{!! Form::close() !!}
							@else
								{{ $user->enabled ? 'Habilitado' : 'Deshabilitado' }}
							@endif
						</td>
						<td>
							@forelse($user->roles as $role)
								<label>{{ $role->name }}</label>
							@empty
								<label class="text-muted">No definido</label>
							@endforelse
						</td>
						<td>{{ $user->created_at ?: '...' }}</td>
						<td>{{ $user->updated_at ?: '...' }}</td>
						<td>
							@if($user->hasEditableRole() && (Gate::check('users.show') || Gate::check('users.edit') || Gate::check('users.destroy')))
								<div class="btn-group">
									<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
									<div class="dropdown-menu dropdown-menu-right">
										@can('users.show') <a class="dropdown-item" href="{{ route('users.show', ['user' => $user->id]) }}">Abrir</a> @endcan
										@can('users.edit') <a class="dropdown-item" href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a> @endcan
										@can('users.destroy')
											<a class="dropdown-item" href="javascript:deleteUser({{ $user->id }});">Eliminar</a>
											<form id="delete-user-{{ $user->id }}" method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
												@csrf
												@method('DELETE')
											</form>
										@endcan
										@if(Gate::check('users.assignRole') || Gate::check('users.resetPassword'))
											<div class="dropdown-divider"></div>
											@can('users.assignRole') <a class="dropdown-item" href="{{ route('users.assignRole', ['user' => $user->id]) }}">Asignar Rol</a> @endcan
											@can('users.resetPassword')
												<a class="dropdown-item" href="javascript:resetPassword({{ $user->id }});">Restablecer contraseña</a>
												<form id="reset-password-{{ $user->id }}" method="POST" action="{{ route('users.resetPassword', ['user' => $user->id]) }}">
													@csrf
													@method('PATCH')
												</form>
											@endcan
										@endif
									</div>
								</div>
							@else
								<label class="text-muted">No disponible</label>
							@endif
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="7">No se encontraron registros</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		{{ $users->links() }}
	</div>
@endsection

@push('scripts')
	@include('users.includes.delete-user')
	@include('users.includes.reset-password')
	@include('users.includes.change-state')
@endpush
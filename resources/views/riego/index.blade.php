@extends('layouts.app')

@section('title', 'riegos de usuarios')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('riegos.index'), 'text'=>'riegos', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
	<div class="float-right">
		<a class="btn" href="{{ route('riegos.index') }}">Recargar página</a>
	</div>
	@can('riegos.create') <a class="btn btn-primary" href="{{ route('riegos.create') }}">Nuevo registro</a> @endcan
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Lista de riegos</caption>
			<thead class="thead-light">
				<tr>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Descripción</th>
					<th>Intervalo</th>
					<th>Tiempo</th>
					<th>Estado</th>
					@if(Gate::check('riegos.show') || Gate::check('riegos.edit') || Gate::check('riegos.destroy'))
						<th>Acciones</th>
					@endif
				</tr>
			</thead>
			<tbody>



				@forelse($riegos as $riego)
					<tr ondblclick="window.location='{{ route('riegos.show', ['riego' => $riego->id]) }}';" title="Presione doble click para cargar el registro">
						<td>{{ $riego->name }}</td>
						<td>{{ $riego->name }}</td>
						<td>{{ $riego->description }}</td>
						<td>
							
							@if($riego->editable && Gate::check('riegos.edit'))
								<a href="{{ route('riegos.editPermissions', ['riego' => $riego->id]) }}" title="ver permisos">
									{{ $permissions }}
								</a>
							@else
								{{ $permissions }}
							@endcannot
						</td>
						<td>{{ $riego->created_at }}</td>
						<td>{{ $riego->updated_at }}</td>
						@if(Gate::check('riegos.show') || Gate::check('riegos.edit') || Gate::check('riegos.destroy'))
						<td>
							@if($riego->editable)
								<div class="btn-group">
									<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
									<div class="dropdown-menu dropdown-menu-right">
										@can('riegos.show') <a class="dropdown-item" href="{{ route('riegos.show', ['riego' => $riego->id]) }}">Abrir</a> @endcan
										@can('riegos.edit') <a class="dropdown-item" href="{{ route('riegos.edit', ['riego' => $riego->id]) }}">Editar</a> @endcan
										@can('riegos.destroy')
											<a class="dropdown-item" href="javascript:deleteriego({{ $riego->id }});">Eliminar</a>
											<form id="delete-riego-{{ $riego->id }}" method="POST" action="{{ route('riegos.destroy',['riego' => $riego->id]) }}">
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
		{{ $riegos->links() }}
	</div>
@endsection

@push('scripts')
	@include('riegos.includes.delete-riego')
@endpush
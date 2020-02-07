@extends('layouts.app')

@section('title', 'riegos')

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
		<a class="btn" href="">Recargar página</a>
	</div>
	 <a class="btn btn-primary" href="{{ route('riegos.create') }}">Nuevo registro</a> 
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Lista de riegos</caption>
			<thead class="thead-light">
				<tr>
					<!--['nombre', 'tipo', 'descripcion', 'intervalo', 'tiempo','estado'];-->
				
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Descripcion</th>
					<th>Intervalo</th>
					<th>Tiempo</th>
					<th>Estado</th>
					<th>Creacion</th>
					<th>Acciones</th>
				</tr>
				 @forelse($riegos as $riego)
				 	<td>{{ $riego->nombre }}</td>
					<td>{{ $riego->tipo }}</td>
					<td>{{ $riego->descripcion }}</td>
					<td>{{ $riego->intervalo }}</td>
					<td>{{ $riego->tiempo }}</td>
					<td>{{ $riego->estado }}</td>
					<td>{{ $riego->created_at ?: '...' }}</td>

					<td>
								<div class="btn-group">
									<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
									<div class="dropdown-menu dropdown-menu-right">
										@can('riegos.show') <a class="dropdown-item" href="{{ route('riegos.show', ['riego' => $riego->id]) }}">Abrir</a> @endcan
										@can('riegos.edit') <a class="dropdown-item" href="{{ route('riegos.edit', ['riego' => $riego->id]) }}">Editar</a> @endcan
										@can('riegos.destroy')
											<a class="dropdown-item" href="javascript:deleteRiego({{ $riego->id }});">Eliminar</a>
											<form id="delete-riego-{{ $riego->id }}" method="POST" action="{{ route('riegos.destroy', ['riego' => $riego->id]) }}">
												@csrf
												@method('DELETE')
											</form>
										@endcan
										
									</div>
								</div>
							
						</td>




				 	</tr>
				 @empty
					<tr>
						<td colspan="7">No se encontraron registros</td>
					</tr>
				@endforelse


			</thead>
			
			
		</table>
		
	</div>
@endsection
	@push('scripts')
	@include('riegos.includes.delete-riego')
@endpush

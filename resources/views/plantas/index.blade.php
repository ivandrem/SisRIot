@extends('layouts.app')

@section('title', 'plantas')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('plantas.index'), 'text'=>'plantas', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')

	<div class="float-right">
		<a class="btn" href="">Recargar página</a>
	</div>
	@can('plantas.create') <a class="btn btn-primary" href="{{ route('plantas.create') }}">Nuevo registro</a> @endcan
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Lista de plantas</caption>
			<thead class="thead-light">
				<tr>
					<!-- ['id','variedad','Descripcion','total','estado','observaciones'];; -->
					<th>id</th>
					<th>Variedad</th>
					<th>Descripcion</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Obsercaciones</th>
					<th>Creado</th>
					<th>Acciones</th>
				</tr>
				 @forelse($plantas as $planta)
				 	<td>{{ $planta->id }}</td>
					<td>{{ $planta->variedad }}</td>
					<td>{{ $planta->Descripcion }}</td>
					<td>{{ $planta->total }}</td>
					<td>{{ $planta->estado }}</td>
					<td>{{ $planta->observaciones }}</td>

					<td>{{ $planta->created_at ?: '...' }}</td>

					<td>
								<div class="btn-group">
									<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
									<div class="dropdown-menu dropdown-menu-right">
										@can('plantas.show') <a class="dropdown-item" href="{{ route('plantas.show', ['planta' => $planta->id]) }}">Abrir</a> @endcan
										@can('plantas.edit') <a class="dropdown-item" href="{{ route('plantas.edit', ['planta' => $planta->id]) }}">Editar</a> @endcan
										@can('plantas.destroy')
											<a class="dropdown-item" href="javascript:deletePlanta({{ $planta->id }});">Eliminar</a>
											<form id="delete-planta-{{ $planta->id }}" method="POST" action="{{ route('plantas.destroy', ['planta' => $planta->id]) }}">
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
	@include('plantas.includes.delete-planta')
@endpush

@extends('layouts.app')

@section('title', 'Parcelas')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('parcelas.index'), 'text'=>'Parcelas', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')

	<div class="float-right">
		<a class="btn" href="">Recargar página</a>
	</div>
	@can('parcelas.create') <a class="btn btn-primary" href="{{ route('parcelas.create') }}">Nuevo registro</a> @endcan
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Lista de parcelas</caption>
			<thead class="thead-light">
				<tr>
					<th>Numero de parcela</th>
					<th>Nombre</th>
					<th>variedad</th>
					<th>tipo</th>
					<th>Estado</th>
					<th>Creacion</th>
					<th>Última actualización</th>
					<th>Acciones</th>
				</tr>
				 @forelse($parcelas as $parcela)
				 	<td>{{ $parcela->numero }}</td>
					<td>{{ $parcela->name }}</td>
					<td>{{ $parcela->variedad }}</td>
					<td>{{ $parcela->tipo }}</td>
					<td>{{ $parcela->enabled }}</td>
					<td>{{ $parcela->created_at ?: '...' }}</td>
					<td>{{ $parcela->updated_at ?: '...' }}</td>

					<td>
								<div class="btn-group">
									<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
									<div class="dropdown-menu dropdown-menu-right">
										@can('parcelas.show') <a class="dropdown-item" href="{{ route('parcelas.show', ['parcela' => $parcela->id]) }}">Abrir</a> @endcan
										@can('parcelas.edit') <a class="dropdown-item" href="{{ route('parcelas.edit', ['parcela' => $parcela->id]) }}">Editar</a> @endcan
										@can('parcelas.destroy')
											<a class="dropdown-item" href="javascript:deleteParcela({{ $parcela->id }});">Eliminar</a>
											<form id="delete-parcela-{{ $parcela->id }}" method="POST" action="{{ route('parcelas.destroy', ['parcela' => $parcela->id]) }}">
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
	@include('parcelas.includes.delete-parcela')
@endpush

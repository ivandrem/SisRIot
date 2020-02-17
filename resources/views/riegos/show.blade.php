@extends('layouts.app')

@section('title', 'Actualizacion de riego')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('riegos.index'), 'text'=>'riegos'],
			['href'=>route('riegos.show',['riego'=>$riego]), 'text'=>$riego->name, 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')



<div class="row mb-2">
		<div class="col text-right">
		
			@can('riegos.edit')
				<div class="btn-group mr-2" role="group" aria-label="">
					<a href="{{ route('riegos.edit', ['riego'=>$riego->id]) }}" class="btn btn-secondary"><i class='fas fa-pencil-alt'></i></a>
				</div>
			@endcan
			@can('riegos.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deleteRiego({{ $riego->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-riego-{{ $riego->id }}" method="POST" action="{{ route('riegos.destroy', ['riego'=>$riego->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
<hr>

<!--['nombre', 'tipo', 'descripcion', 'intervalo', 'tiempo','estado'];-->
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Nombre</label></div>
		<div class="col-sm-10"><p>{{ $riego->nombre }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Tipo</label></div>
		<div class="col-sm-10"><p>{{ $riego->tipo }}</p></div>
	</div>
<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Descripcion</label></div>
		<div class="col-sm-10"><p>{{ $riego->descripcion }}</p></div>
	</div>

	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Intervalo</label></div>
		<div class="col-sm-10"><p>{{ $riego->intervalo }}</p></div>
	</div>
	
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Tiempo</label></div>
		<div class="col-sm-10"><p>{{ $riego->tiempo }}</p></div>
	</div>

	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Estado</label></div>
		<div class="col-sm-10"><p>{{ $riego->estado}}</p></div>
	</div>

	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Fecha creado</label></div>
		<div class="col-sm-10"><p>{{ $riego->created_at ?: '...'}}</p></div>
	</div>



	<hr>
	<div class="row mb-2">
		<div class="col text-right">
			<a href="{{ route('riegos.show', ['riego'=>$riego->id]) }}" class="btn btn-link">Recargar página</a>
		</div>
	</div>
@endsection

@push('scripts')
	@include('riegos.includes.delete-riego')

@endpush
@extends('layouts.app')

@section('title', 'Actualizacion de Parcela')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('parcelas.index'), 'text'=>'Parcelas'],
			['href'=>route('parcelas.show',['parcela'=>$parcela]), 'text'=>$parcela->name, 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')



<div class="row mb-2">
		<div class="col text-right">
		
			@can('parcelas.edit')
				<div class="btn-group mr-2" role="group" aria-label="">
					<a href="{{ route('parcelas.edit', ['parcela'=>$parcela->id]) }}" class="btn btn-secondary"><i class='fas fa-pencil-alt'></i></a>
				</div>
			@endcan
			@can('parcelas.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deleteParcela({{ $parcela->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-parcela-{{ $parcela->id }}" method="POST" action="{{ route('parcelas.destroy', ['parcela'=>$parcela->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
<hr>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Numero de parcela</label></div>
		<div class="col-sm-10"><p>{{ $parcela->numero }}</p></div>
	</div>
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Nombre</label></div>
		<div class="col-sm-10"><p>{{ $parcela->name }}</p></div>
	</div>
<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Tipo</label></div>
		<div class="col-sm-10"><p>{{ $parcela->tipo }}</p></div>
	</div>

	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Variedad</label></div>
		<div class="col-sm-10"><p>{{ $parcela->variedad }}</p></div>
	</div>
	
	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Habilitado</label></div>
		<div class="col-sm-10"><p>{{ $parcela->enabled }}</p></div>
	</div>

	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Fecha creado</label></div>
		<div class="col-sm-10"><p>{{ $parcela->created_at ?: '...'}}</p></div>
	</div>

	<div class="row mb-2">
		<div class="col-sm-2"><label class="font-weight-bold">Fecha Actualizacion</label></div>
		<div class="col-sm-10"><p>{{ $parcela->updated_at ?: '...'  }}</p></div>
	</div>

	<hr>
	<div class="row mb-2">
		<div class="col text-right">
			<a href="{{ route('parcelas.show', ['parcela'=>$parcela->id]) }}" class="btn btn-link">Recargar página</a>
		</div>
	</div>
@endsection

@push('scripts')
	@include('parcelas.includes.delete-parcela')

@endpush
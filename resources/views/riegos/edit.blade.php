@extends('layouts.app')

@section('title', 'Actualizacion de Parcela')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('parcelas.index'), 'text'=>'Parcelas'],
			['href'=>route('parcelas.show',['parcela'=>$parcela]), 'text'=>$parcela->name],
			['href'=>route('parcelas.edit',['parcela'=>$parcela]), 'text'=>'Actualización', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
  	<div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('parcelas.edit',['parcela'=>$parcela]) }}" class="btn btn-secondary"><i class='fas fa-redo'></i></a>
			</div>






			@can('parcelas.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deleteParcela({{ $parcela->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-parcela-{{ $parcela->id }}" method="POST" action="{{ route('parcelas.destroy',['parcela' => $parcela->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
   	@include('parcelas.includes.form', $parcela)
@endsection

@push('scripts')
	@include('parcelas.includes.delete-parcela')
@endpush
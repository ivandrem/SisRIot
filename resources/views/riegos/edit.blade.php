@extends('layouts.app')

@section('title', 'Actualizacion de Riego')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('riegos.index'), 'text'=>'Riegos'],
			['href'=>route('riegos.show',['riego'=>$riego]), 'text'=>$riego->name],
			['href'=>route('riegos.edit',['riego'=>$riego]), 'text'=>'Actualización', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')
  	<div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('riegos.edit',['riego'=>$riego]) }}" class="btn btn-secondary"><i class='fas fa-redo'></i></a>
			</div>






			@can('riegos.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deleteRiego({{ $riego->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-riego-{{ $riego->id }}" method="POST" action="{{ route('riegos.destroy',['riego' => $riego->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
   	@include('riegos.includes.form', $riego)
@endsection

@push('scripts')
	@include('riegos.includes.delete-riego')
@endpush
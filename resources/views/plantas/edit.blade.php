@extends('layouts.app')

@section('title', 'Actualizacion de planta')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('plantas.index'), 'text'=>'Plantas'],
			['href'=>route('plantas.show',['planta'=>$planta]), 'text'=>$planta->variedad],
			['href'=>route('plantas.edit',['planta'=>$planta]), 'text'=>'Actualización', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')


    
  	<div class="row mb-2">
		<div class="col text-right">
			<div class="btn-group mr-2" role="group" aria-label="">
				<a href="{{ route('plantas.edit',['planta'=>$planta]) }}" class="btn btn-secondary"><i class='fas fa-redo'></i></a>
			</div>






			@can('plantas.destroy')
				<div class="btn-group" role="group" aria-label="">
					<a class="btn btn-secondary" href="javascript:deletePlanta({{ $planta->id }});"><i class='fas fa-trash'></i></a>
					<form id="delete-planta-{{ $planta->id }}" method="POST" action="{{ route('plantas.destroy',['planta' => $planta->id]) }}">
						@csrf
						@method('DELETE')
					</form>
				</div>
			@endcan
		</div>
	</div>
   	@include('plantas.includes.form', $planta)
@endsection

@push('scripts')
	@include('plantas.includes.delete-planta')
@endpush
@extends('layouts.app')

@section('title', 'Parcelas')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Parcelas', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')


	<div class="float-right">
		<a class="btn" href="">Recargar página</a>
	</div>
	
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Lista de parcelas</caption>
			<thead class="thead-light">
				<tr>
					<th>Numero de parcela</th>
					<th>numero</th>
					<th>variedad</th>
					<th>tipo</th>
					<th>Estado</th>
					<th>Última actualización</th>
					
				</tr>
				 
			</thead>
			
			
		</table>
		
	</div>
@endsection

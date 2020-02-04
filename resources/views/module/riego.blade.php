@extends('layouts.app')

@section('title', 'Riego')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Riego', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')


<div class="float-right">
		<a class="btn btn-primary" href="">Regar ahora</a>
		<a class="btn btn-primary" href="">Apagar actuadores</a>
	</div>
	 <a class="btn btn-primary" href="">Nuevo Sistema de riego</a>
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Registro de riegos</caption>
			<thead class="thead-light">
				<tr>
					<th>Numero de Riego</th>
					<th>Nombre</th>
					
					<th>Cultivo</th>
					<th>Duracion</th>
					<th>Intervalos</th>
					
				</tr>
				<tr>
					<th>1</th>
					<th>Riego lluvia</th>
					<th>Maracuya</th>
					<th>10m</th>
					<th>Sin intervalo</th>
					
				</tr>

				<tr>
					<th>2</th>
					<th>Riego Tarde_noche</th>
					<th>--</th>
					<th>3m</th>
					<th>30m</th>
					
				</tr>

				<tr>
					<th>3</th>
					<th>Riego Disp</th>
					<th>--</th>
					<th>5m</th>
					<th>180m</th>
					
				</tr>

				<tr>
					<th>4</th>
					<th>Riego Serv</th>
					<th>--</th>
					<th>7m</th>
					<th>360m</th>
					
				</tr>
			</thead>
			
					<tr>
						<td colspan="7">No se encontraron registros</td>
					</tr>
				
			</tbody>
		</table>
		
	</div>
@endsection

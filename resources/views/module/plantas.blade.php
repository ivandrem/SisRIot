@extends('layouts.app')

@section('title', 'Plantas')

@section('content')
	@component('layouts.components.breadcrumb', ['routes' => [
			['href'=>route('home'), 'text'=>'Inicio'],
			['href'=>route('roles.index'), 'text'=>'Plantas', 'active'=>true]
		]
	])
	@endcomponent
	@include('layouts.includes.errors')
    @include('layouts.includes.messages')


<div class="float-right">
		<a class="btn btn-primary" href="">Recargar página</a>
	</div>
	 <a class="btn btn-primary" href="">Nuevo Cultivo</a>
	<div class="table-responsive mt-3">
		<table class="table table-bordered table-hover">
			<caption>Registro de Cultivos</caption>
			<thead class="thead-light">
				<tr>
					<th>#</th>
					<th>Nombre de Cultivo</th>
					<th>Parcela Asignada</th>
					<th>Estado</th>
					<th>Observaciones</th>
					
				</tr>
				<tr>
                    <td>1</td>
                    <td>hortaliza</td>    
                    <td>Parcela Pequeña</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:17:24</td>
                </tr>
                 <tr>
                    <td>2</td>
                    <td>Maracuya</td>    
                    <td>Parcela Pequeña</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:27:22</td>
                </tr>
                 <tr>
                    <td>3</td>
                    <td>pino</td>    
                    <td>Parcela Pequeña</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:30:02</td>
                </tr>
                 <tr>
                    <td>4</td>
                    <td>roble</td>    
                    <td>Parcela Grande</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:33:00</td>
                </tr>
                 <tr>
                    <td>5</td>
                    <td>cafe</td>    
                    <td>Parcela Grande</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:34:00</td>
                </tr>
                 <tr>
                    <td>6</td>
                    <td>cacao</td>    
                    <td>Parcela Grande</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:35:24</td>
                </tr>
                 <tr>
                    <td>7</td>
                    <td>limon</td>    
                    <td>Parcela Mediana</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:35:59</td>
                </tr>
                 <tr>
                    <td>8</td>
                    <td>naranja</td>    
                    <td>--</td>
                    <td>Activo</td>
                    <td>2019-12-28 23:36:24</td>
                </tr>
			</thead>
			
					<tr>
						<td colspan="7">No se encontraron registros</td>
					</tr>
				
			</tbody>
		</table>
		
	</div>
@endsection

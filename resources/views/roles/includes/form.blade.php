@if(isset($role))
    {!! Form::model($role, ['id'=>'roleForm', 'method'=>'PUT', 'url'=>route('roles.update',['role'=>$role->id])]) !!} <!-- Edit Form -->
@else
    {!! Form::open(['id'=>'roleForm', 'method'=>'POST', 'url'=>route('roles.store')]) !!} <!-- Create Form -->
@endif
    	{{ Form::token() }}
    	<div class="form-group row">
    		{{ Form::label('name', 'Nombre', ['class'=>'col-sm-2 col-form-label']) }}
    		<div class="col-sm-10">
    			{{ Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del nuevo Rol', 'required'=>true, 'autofocus'=>true]) }}
    		</div>
    	</div>
    	<div class="form-group row">
    		{{ Form::label('slug', 'Nombre clave', ['class'=>'col-sm-2 col-form-label']) }}
    		<div class="col-sm-10">
    			{{ Form::text('slug', old('slug'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre clave', 'required'=>true, 'onkeyup'=>'this.value = this.value.toLowerCase();']) }}
    		</div>
    	</div>
    	@include('roles.includes.select-permissions', ['open_in_another_view'=>true])
    	<div class="form-group row">
    		{{ Form::label('description', 'Descripción', ['class'=>'col-sm-2 col-form-label']) }}
    		<div class="col-sm-10">
    			{{ Form::textarea('description', old('description'), ['rows'=>'5', 'class'=>'form-control', 'placeholder'=>'Ingrese una descripcción']) }}
    		</div>
    	</div>
    	<div class="row justify-content-end">
    		<div class="col-sm-10">
    			{{ Form::submit('Guardar',['class'=>'btn btn-primary']) }}
                @php
                    if(url()->previous() == url()->current()){$cancel_route = route('roles.index');}
                    else{$cancel_route = url()->previous();}
                @endphp
                {{ link_to($cancel_route, 'Cancelar', ['class'=>'btn btn-light']) }}
            </div>
    	</div>
    {!! Form::close() !!}
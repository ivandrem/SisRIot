@if(isset($user))
    {!! Form::model($user, ['id'=>'userForm', 'method'=>'PUT', 'url'=>route('users.update',['user'=>$user->id])]) !!} <!-- Edit Form -->
@else
    {!! Form::open(['id'=>'userForm', 'method'=>'POST', 'url'=>route('users.store')]) !!} <!-- Create Form -->
@endif
    	{{ Form::token() }}
        <div class="form-group row">
            {{ Form::label('dni', 'DNI', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('dni', old('dni'), ['class'=>'form-control', 'placeholder'=>'Ingrese el dni', 'required'=>true, 'autofocus'=>!isset($user), 'disabled'=> isset($user)]) }}
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
        </div>
    	<div class="form-group row">
    		{{ Form::label('name', 'Nombre', ['class'=>'col-sm-2 col-form-label']) }}
    		<div class="col-sm-10">
    			{{ Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre', 'required'=>true, 'autofocus'=>isset($user)]) }}
    		    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
    	</div>
        <div class="form-group row">
    		{{ Form::label('email', 'Email', ['class'=>'col-sm-2 col-form-label']) }}
    		<div class="col-sm-10">
    			{{ Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Ingrese el email', 'required'=>true, 'onkeyup'=>'this.value = this.value.toLowerCase();']) }}
    		    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
    	</div>
        <div class="form-group row">
            {{ Form::label('phone', 'Teléfono', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Ingrese el teléfono']) }}
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>
    	<div class="row justify-content-end">
    		<div class="col-sm-10">
    			{{ Form::submit('Guardar',['class'=>'btn btn-primary']) }}
                @php
                    if(url()->previous() == url()->current()){$cancel_route = route('users.index');}
                    else{$cancel_route = url()->previous();}
                @endphp
                {{ link_to($cancel_route, 'Cancelar', ['class'=>'btn btn-light']) }}
            </div>
    	</div>
    {!! Form::close() !!}
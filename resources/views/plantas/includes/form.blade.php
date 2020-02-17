@if(isset($planta))
    {!! Form::model($planta, ['id'=>'plantasForm', 'method'=>'PUT', 'url'=>route('plantas.update',['planta'=>$planta->id])]) !!} <!-- Edit Form -->
@else
    {!! Form::open(['id'=>'plantasForm', 'method'=>'POST', 'url'=>route('plantas.store')]) !!} <!-- Create Form -->
@endif
    	{{ Form::token() }}



    <!--['id','variedad','Descripcion','total','estado','observaciones'];-->

        <div class="form-group row">
            {{ Form::label('variedad', 'Variedad', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('variedad', old('variedad'), ['class'=>'form-control', 'placeholder'=>'Ingrese el variedad del planta', 'required'=>true, 'autofocus'=>isset($Planta)]) }}
                @error('variedad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('Descripcion', 'Descripcion', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('Descripcion', old('Descripcion'), ['class'=>'form-control', 'placeholder'=>'Ingrese el Descripcion del planta', 'required'=>true, 'autofocus'=>isset($Planta)]) }}
                @error('Descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('total', 'Total', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('total', old('total'), ['class'=>'form-control', 'placeholder'=>'Ingrese el total del planta', 'required'=>true, 'autofocus'=>isset($Planta)]) }}
                @error('total')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('estado', 'Estado', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('estado', old('estado'), ['class'=>'form-control', 'placeholder'=>'Ingrese el estado del planta', 'required'=>true, 'autofocus'=>isset($Planta)]) }}
                @error('estado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
        </div>

<div class="form-group row">
            {{ Form::label('observaciones', 'Observaciones', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('observaciones', old('observaciones'), ['class'=>'form-control', 'placeholder'=>'Ingrese el observaciones del planta', 'required'=>true, 'autofocus'=>isset($Planta)]) }}
                @error('observaciones')
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
                    if(url()->previous() == url()->current()){$cancel_route = route('plantas.index');}
                    else{$cancel_route = url()->previous();}
                @endphp
                {{ link_to($cancel_route, 'Cancelar', ['class'=>'btn btn-light']) }}
            </div>
    	</div>
    {!! Form::close() !!}
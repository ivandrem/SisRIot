@if(isset($riego))
    {!! Form::model($riego, ['id'=>'riegoForm', 'method'=>'PUT', 'url'=>route('riegos.update',['riego'=>$riego->id])]) !!} <!-- Edit Form -->
@else
    {!! Form::open(['id'=>'riegoForm', 'method'=>'POST', 'url'=>route('riegos.store')]) !!} <!-- Create Form -->
@endif
        {{ Form::token() }}



<!--protected $fillable = ['nombre', 'tipo', 'descripcion', 'intervalo', 'tiempo','estado'];-->
        <div class="form-group row">
            {{ Form::label('nombre', 'Nombre', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('nombre', old('nombre'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del riego', 'required'=>true, 'autofocus'=>isset($Riego)]) }}
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
        </div>


    <div class="form-group row">
            {{ Form::label('tipo', 'Tipo', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('tipo', old('tipo'), ['class'=>'form-control', 'placeholder'=>'Ingrese el tipo de riego', 'required'=>true, 'autofocus'=>isset($Riego)]) }}
                @error('tipo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>


    <div class="form-group row">
            {{ Form::label('descripcion', 'Descripcion', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('descripcion', old('descripcion'), ['class'=>'form-control', 'placeholder'=>'Ingrese la descripcion', 'required'=>true, 'autofocus'=>isset($Riego)]) }}
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>

    <div class="form-group row">
            {{ Form::label('intervalo', 'Intervalo', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('intervalo', old('intervalo'), ['class'=>'form-control', 'placeholder'=>'Ingrese el intervalo', 'required'=>true, 'autofocus'=>isset($Riego)]) }}
                @error('intervalo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>


    <div class="form-group row">
            {{ Form::label('tiempo', 'Tiempo', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('tiempo', old('tiempo'), ['class'=>'form-control', 'placeholder'=>'Ingrese el Tiempo', 'required'=>true, 'autofocus'=>isset($Riego)]) }}
                @error('tiempo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>


    <div class="form-group row">
            {{ Form::label('estado', 'Estado', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('estado', old('estado'), ['class'=>'form-control', 'placeholder'=>'estado', 'required'=>true, 'autofocus'=>isset($Riego)]) }}
                @error('estado')
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
                    if(url()->previous() == url()->current()){$cancel_route = route('riegos.index');}
                    else{$cancel_route = url()->previous();}
                @endphp
                {{ link_to($cancel_route, 'Cancelar', ['class'=>'btn btn-light']) }}
            </div>
        </div>
    {!! Form::close() !!}
@if(isset($parcela))
    {!! Form::model($parcela, ['id'=>'parcelaForm', 'method'=>'PUT', 'url'=>route('parcelas.update',['parcela'=>$parcela->id])]) !!} <!-- Edit Form -->
@else
    {!! Form::open(['id'=>'parcelaForm', 'method'=>'POST', 'url'=>route('parcelas.store')]) !!} <!-- Create Form -->
@endif
    	{{ Form::token() }}




        <div class="form-group row">
            {{ Form::label('numero', 'Numero', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('numero', old('numero'), ['class'=>'form-control', 'placeholder'=>'Ingrese el Numero de la parcela', 'required'=>true, 'autofocus'=>isset($Parcela)]) }}
                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
        </div>


    <div class="form-group row">
            {{ Form::label('name', 'Nombre', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre', 'required'=>true, 'autofocus'=>isset($Parcela)]) }}
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>


        <div class="form-group row">
            {{ Form::label('variedad', 'Variedad', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('variedad', old('variedad'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre', 'required'=>true, 'autofocus'=>isset($Parcela)]) }}
                @error('variedad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>

        <div class="form-group row">
            {{ Form::label('tipo', 'Tipo', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('tipo', old('tipo'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre', 'required'=>true, 'autofocus'=>isset($Parcela)]) }}
                @error('tipo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
            </div>
        </div>



        <div class="form-group row">
            {{ Form::label('enabled', 'Habilitado', ['class'=>'col-sm-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('enabled', old('enabled'), ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre', 'required'=>true, 'autofocus'=>isset($Parcela)]) }}
                @error('enabled')
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
                    if(url()->previous() == url()->current()){$cancel_route = route('parcelas.index');}
                    else{$cancel_route = url()->previous();}
                @endphp
                {{ link_to($cancel_route, 'Cancelar', ['class'=>'btn btn-light']) }}
            </div>
    	</div>
    {!! Form::close() !!}
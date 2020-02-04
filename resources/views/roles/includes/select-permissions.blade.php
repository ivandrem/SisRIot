<div class="form-group row">
	{{ Form::label('special', 'Permisos', ['class'=>'col-sm-2 col-form-label']) }}
	<div class="col-sm-10">
		<div class="form-check">
            {{ Form::radio('special', 'all-access', null, ['class'=>'form-check-input']) }}
            {{ Form::label('special', 'Todos', ['class'=>'form-check-label']) }}
		</div>
		<div class="form-check">
            {{ Form::radio('special', 'no-access', null, ['class'=>'form-check-input']) }}
            {{ Form::label('special', 'Ninguno', ['class'=>'form-check-label']) }}
		</div>
		<div class="form-check">
            {{ Form::radio('special', null, true, ['class'=>'form-check-input']) }}
            {{ Form::label('special', 'Personalizar', ['class'=>'form-check-label', 'title'=>'Seleccione esta opción y luego guarde para validar los permisos']) }}
            @isset($role)
                @push('links')
                    <style type="text/css">
                        input[type="radio"] ~ fieldset{
                            display: none;
                            visibility: hidden;
                            transition: all 0.5s ease;
                        }
                        input[type="radio"]:checked ~ fieldset{
                            display: block;
                            visibility: visible;
                            transition: all 0.5s ease;
                        }
                    </style>
                @endpush
                <fieldset>
                    @foreach($permissions as $permission)
                        <div class="form-check">
                            {{ Form::checkbox('permissions[]', $permission->slug, $role->hasPermissionTo($permission->slug), ['class'=>'form-check-input']) }}
                            {{ Form::label($permission->slug, $permission->name.'.', ['class'=>'form-check-label font-weight-bold']) }}
                            {{ Form::label($permission->slug, $permission->description, ['class'=>'form-check-label font-italic']) }}
                        </div>
                    @endforeach
                    @isset($open_in_another_view)
                        {{ link_to(route('roles.editPermissions',['role'=>$role]), 'administrar permisos en otra vista', ['class'=>'btn btn-link']) }}
                        <hr>
                    @endisset
                </fieldset>
            @endisset
		</div>
	</div>
</div>
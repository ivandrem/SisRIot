@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
 <div class="card-header">Roles</div>

                <div class="card-body">

<form>
  <div class="form-group">
    <label for="Text">Nombre del Rol</label>
    <input type="Text" class="form-control" id="Text" aria-describedby="" placeholder="Ingresar Rol">
    </div>
<label for="Text">Permisos </label>
<div class="form-group">
  <div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Lectura</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">Escritura</label>
</div></div>
<div class="form-group">
  <button type="submit" class="btn btn-primary">Crear</button></div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>


@endsection
@extends('CRUD.navbar')

@section('title', 'Nuevo producto')

    @section('content')

    <form class="form-horizontal" action="{{ route('producto.store') }}" method="POST">
          {{ csrf_field() }}
      <fieldset>
        <legend>Nuevo producto</legend>

        <div class="form-group">
          <label for="inputnombre" class="col-lg-2 control-label">Nombre</label>
          <div class="col-lg-8">
            @if ($errors->has('nombre'))
              <span style="color: red;">{{ $errors->first('nombre') }}</span>
            @endif
            <input type="text" class="form-control" name="nombre" id="inputnombre" placeholder="Nombre">
          </div>
        </div>

        <div class="form-group">
          <label for="inputprecio" class="col-lg-2 control-label">Precio</label>
          <div class="col-lg-8">
            @if ($errors->has('precio'))
              <span style="color: red;">{{ $errors->first('precio') }}</span>
            @endif
            <input type="text" class="form-control" name="precio" id="inputprecio" placeholder="Precio">
          </div>
        </div>

        <div class="form-group">
          <label for="select" class="col-lg-2 control-label">Seleccione la marca</label>
          <div class="col-lg-8">
            <select class="form-control" id="select" name="marca_id">
              @foreach ($marca_id as $marca)
              <option value="{{ $marca->id }}">{{$marca->nombre}}</option>
              @endforeach
            </select>
            @if ($errors->has('marca_id'))
              <span style="color: red;">{{ $errors->first('marca_id') }}</span>
            @endif
          </div>
        </div>


        <div class="form-group">
          <div class="col-lg-8 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Borrar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </fieldset>
    </form>


    @endsection

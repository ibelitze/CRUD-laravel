@extends('CRUD.navbar')

@section('title', 'Editar producto')

    @section('content')

    @if (isset($producto) and isset($marca))
    <form class="form-horizontal" role="form" action="{{ route('producto.update', $producto->id) }}" method="POST">

        <input type="hidden" name="_method" value="PUT">
          {{ csrf_field() }}
      <fieldset>
        <legend>Editar producto</legend>

        <div class="form-group">
          @if ($errors->has('nombre'))
            <span style="color: red;">{{ $errors->first('nombre') }}</span>
          @endif
          <label for="inputnombre" class="col-lg-2 control-label">Nombre</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" name="nombre" id="inputnombre" value="{{ $producto->nombre}}">
          </div>
        </div>

        <div class="form-group">
          @if ($errors->has('precio'))
            <span style="color: red;">{{ $errors->first('precio') }}</span>
          @endif
          <label for="inputprecio" class="col-lg-2 control-label">Precio</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" name="precio" id="inputprecio" value="{{$producto->precio}}">
          </div>
        </div>

        <div class="form-group">
          <label for="select" class="col-lg-2 control-label">Seleccione la marca</label>
          <div class="col-lg-8">
            <select class="form-control" id="select" name="marca_id">
              @foreach ($marca as $marca)
                  @if ($marca->id == $producto->marca_id)
                    <option selected value="{{ $marca->id }}">{{$marca->nombre}}</option>
                  @else
                    <option value="{{ $marca->id }}">{{$marca->nombre}}</option>
                  @endif
              @endforeach
            </select>
          </div>
        </div>


        <div class="form-group">
          <div class="col-lg-8 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </fieldset>
    </form>
    @endif

    @endsection

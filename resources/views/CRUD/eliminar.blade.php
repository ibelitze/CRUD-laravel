@extends('CRUD.navbar')

@section('title', 'Eliminar producto')

    @section('content')

    <form class="form-horizontal" action="{{ route('producto.destroy', $producto->id) }}" method="POST">

        <input type="hidden" name="_method" value="DELETE">
          {{ csrf_field() }}
      <fieldset>
        <legend>Eliminar producto</legend>

        <div class="form-group">
          <div class="col-lg-8 col-lg-offset-2">
              <h3>Está seguro que desea eliminar este producto?</h3>
              <p><b>Nombre: </b> {{ $producto->nombre }}</p>
              <p><b>Precio: </b> {{ $producto->precio }}</p>
              <p><b>Marca: </b> {{ $marca->nombre }}</p>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-8 col-lg-offset-2">
            <a href="/" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Eliminar</button>
          </div>
        </div>
      </fieldset>
    </form>


    @endsection

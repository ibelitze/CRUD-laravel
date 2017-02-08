@extends('CRUD.navbar')

@section('title', 'Productos')

    @section('content')
      <div class="row">
        <table class="table table-striped table-hover table-bordered table-responsive">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Marca</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $productoss)
            <tr>
              <td>{{ $productoss->id }}</td>
              <td>{{$productoss->producto}}</td>
              <td>{{$productoss->precio}}</td>
              <td>{{$productoss->marca}}</td>
              <td><a href="{{ route('producto.edit', ['id' => $productoss->id]) }}" class="btn btn-warning">Modificar</a> <a href="{{ url('eliminar', $productoss->id) }}" class="btn btn-danger">Eliminar</a></td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>

        <!-- Paginación -->
      <div class="row">
            {!! $productos->render() !!}
      </div>
    @endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CRUD\productosCreateRequest;
use App\Http\Requests\CRUD\productosUpdateRequest;
use App\productos;
use App\marcas;
use Illuminate\Database\Query\Builder;

class ProductoController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $productos= productos::
        select('productos.id','productos.nombre as producto','productos.precio', 'marcas.nombre as marca')
        ->join('marcas', 'marcas.id','=', 'productos.marca_id')->paginate(5);

        return view('CRUD/productos')->with('productos',$productos);
    }

//------------------------------------------------------------------------------

    public function create()
    {
        $marca_id= marcas::all();
        return view('CRUD/nuevoProducto')->with('marca_id', $marca_id);
    }

//------------------------------------------------------------------------------

    public function store(productosCreateRequest $request)
    {

        // $this->validate($request, [
        //   'nombre' => 'required',
        //   'precio' => 'required',
        //   'marca_id' => 'required'
        // ]);

        if(productos::create($request->all())){
          return back()->with('msj', 'Datos guardados satisfactoriamente');
        }
        else {
          return back()->with('msj2', 'El producto no pudo ser procesado!, vuelva a intentarlo.');
        }

    }

//------------------------------------------------------------------------------

    public function show($id)
    {
      $producto= productos::findOrFail($id);
      $idp= $producto->marca_id;
      $marca= marcas::find($idp);
      return view('CRUD/eliminar')->with(['producto'=> $producto, 'marca'=> $marca]);
    }

//------------------------------------------------------------------------------

    public function edit($id)
    {
      $marca= marcas::all();
      $producto= productos::findOrFail($id);
      return view('CRUD/editarProducto')->with(['marca'=>$marca, 'producto'=>$producto]);
    }


//------------------------------------------------------------------------------

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nombre' => 'required',
        'precio' => 'required',
      ]);
        $producto= productos::find($id);

                $producto->nombre = $request->nombre;
                $producto->precio = $request->precio;
                $producto->marca_id = $request->marca_id;

		    if($producto->save()){
          return redirect('dashboard')->with('msj', 'Datos guardados satisfactoriamente');
        }
        else {
          return back()->with('msj2', 'El producto no pudo ser procesado!, vuelva a intentarlo.');
        }

    }

//------------------------------------------------------------------------------

    public function destroy($id)
    {
        $producto= productos::findOrFail($id);
        if($producto->delete()){
          return redirect('dashboard')->with('msj', 'El producto se ha eliminado de la lista');
        }
        else {
          return back()->with('msj2', 'El producto no pudo ser procesado!, vuelva a intentarlo.');
        }
    }
}

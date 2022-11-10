<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(!Gate::allows('admin-permission')){
            abort(403,"Debes ser administrador para acceder a este método");
        }

        $user = Auth::user();
        $productos = Producto::all();
        return view('productos/productosIndex', compact('productos', 'user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(!Gate::allows('admin-permission')){
            abort(403,"Debes ser administrador para acceder a este método");
        }

        return view('productos/productosCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('admin-permission')){
            abort(403,"Debes ser administrador para acceder a este método");
        }

        $request->validate([
            'prod_picture'=>'required',
            'name'=>'required|max:25',
            'price'=>'required',
            'desc'=>'required|max:80',
            'hours'=>'required'
        ]);

        $producto = new Producto;
        $producto->name = $request->name;
        $producto->prod_picture = $request->prod_picture;
        $producto->price = $request->price;
        $producto->desc = $request->desc;
        $producto->hours = $request->hours;
        $producto->save();

        return redirect('/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $user = Auth::user();
        $producto = Producto::find($id);
        return view('compras/compraCreate', compact('producto', 'user')); //Aqui ya es una vista de una compra
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(!Gate::allows('admin-permission')){
            abort(403,"Debes ser administrador para acceder a este método");
        }

        $producto = Producto::find($id);
        return view('productos/productosEdit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Gate::allows('admin-permission')){
            abort(403,"Debes ser administrador para acceder a este método");
        }

        $request->validate([
            'prod_picture'=>'required',
            'name'=>'required|max:25',
            'price'=>'required',
            'desc'=>'required|max:80',
            'hours'=>'required'
        ]);

        $producto = Producto::find($id);
        $producto->name = $request->name;
        $producto->prod_picture = $request->prod_picture;
        $producto->price = $request->price;
        $producto->desc = $request->desc;
        $producto->hours = $request->hours;
        $producto->save();

        return redirect('/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows('admin-permission')){
            abort(403,"Debes ser administrador para acceder a este método");
        }
        
        $producto = Producto::find($id);
        $producto->users()->detach();
        $producto->delete();
        return redirect('/producto');
    }
}

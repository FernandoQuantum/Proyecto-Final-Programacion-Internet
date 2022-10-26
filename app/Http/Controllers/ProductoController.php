<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos/productosIndex', compact('productos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
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
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/producto');
    }
}

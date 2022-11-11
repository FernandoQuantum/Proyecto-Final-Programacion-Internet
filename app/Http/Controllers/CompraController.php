<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;



class CompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('index', 'makeCompra', 'cambiarStatus');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();

        if($user->type == "cliente"){
            $compras = User::find($user->id)->compras;            
            return view('compras/comprasListarCliente', compact('user','compras'));
        }
        else if($user->type == "admin"){

            if(!Gate::allows('admin-permission')){
                abort(403,"Debes ser administrador para acceder a este método");
            }
            // $compras = Compra::with('user')->get();
            $compras = Compra::withTrashed()->with('user')->get();
            return view('compras/comprasListarAdmin', compact('user','compras'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //La creación del producto sí se realiza en una vista de compras
        //pero necesitaba la id dada por show en ProductoController!!!!
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra = Compra::find($id);
        $this->authorize('delete', $compra);

        $compra->delete();
        return redirect("/compra");
    }

    
    public function makeCompra($id, Request $request){

        $request->validate([
            'amount'=>'required|numeric|gt:0|lt:201',
            'mode'=>['required', Rule::in(['0', '1'])],
        ]);

        $producto = Producto::find($id);

        if($request->mode == 0){
            $total = $request->amount * $producto->price;
        }
        else if($request->mode == 1){
            $total = ($request->amount * $producto->price) * 1.1; //Aplicamos cargo extra por envío
        }

        $user = User::find(Auth::id());
        $user->productos()->attach($id);

        $compra = new Compra;
        $compra->user_id = Auth::id();
        $compra->total = $total;
        $compra->prod_name = $producto->name;
        $compra->mode = $request->mode;
        $compra->status = "pendiente";
        $compra->amount = $request->amount;
        $compra->save();


        return view('compras/compraConfirmada', compact('producto', 'user', 'total'));
    }

    public function cambiarStatus($id){

        if(!Gate::allows('admin-permission')){
            abort(403,"Acción solo permitida para administrador");
        }

        $compra = Compra::find($id);

        if($compra->status == "pendiente"){
            $compra->status = "listo";
        }
        else if($compra->status == "listo"){
            $compra->status = "entregado";
        }

        $compra->save();
        return redirect('/compra');
    }

    public function hardDelete($id_compra){

        if(!Gate::allows('admin-permission')){
            abort(403,"Acción solo permitida para administrador");
        }

        $compra = Compra::withTrashed()->where('id',$id_compra);
        $compra->forceDelete();

        return redirect('/compra');
    }

    public function apiJSON(){

        if(!Gate::allows('admin-permission')){
            abort(403,"Acción solo permitida para administrador");
        }
        return Compra::all();
    }

}

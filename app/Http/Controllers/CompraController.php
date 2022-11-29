<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionCompra;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class CompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('index', 'makeCompra', 'cambiarStatus');
        $this->middleware('verified')->only('index', 'makeCompra');
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
        return redirect("/compra")->with('info', 'Compra cancelada exitosamente');
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

        Mail::to($user->email)->send(new NotificacionCompra($user, $compra));
        return view('compras/compraConfirmada', compact('producto', 'user', 'total'));
    }

    public function cambiarStatus($id){

        if(!Gate::allows('admin-permission')){
            abort(403,"Acción solo permitida para administrador");
        }

        $compra = Compra::find($id);

        if($compra->status == "pendiente"){
            $compra->status = "listo";
            $compra->save();
            return redirect('/compra')->with('info','Producto alistado');
        }
        else if($compra->status == "listo"){
            $compra->status = "entregado";
            $compra->save();
            return redirect('/compra')->with('info','Producto entregado');
        }
        
    }

    public function hardDelete($id_compra){

        if(!Gate::allows('admin-permission')){
            abort(403,"Acción solo permitida para administrador");
        }

        $compra = Compra::withTrashed()->where('id',$id_compra);
        $compra->forceDelete();

        return redirect('/compra')->with('info', 'Compra borrada definitivamente');
    }


}

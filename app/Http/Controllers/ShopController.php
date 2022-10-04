<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ShopController extends Controller
{   
    public function contacto($codigo = null){

        if($codigo == '1234'){
            $nombre = "Fercho";
            $email = "fer@gmail.com";
        }
        else{
            $nombre = "";
            $email = "";
        }
        return view('contacto', compact('nombre', 'email', 'codigo'));
    }


    public function recibe_form(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone'=>'required'
        ]);
        
        // $new_insert = Cliente::create(['name'=>$request->name,
        //                                 'email'=>$request->email,
        //                                 'phone'=>$request->phone,
        //                                 'address'=>$request->address]);

        $cliente = new Cliente;
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->address = $request->address;
        $cliente->phone = $request->phone;
        $cliente->save();
        
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            echo $cliente->name; echo "<br>";
            echo $cliente->email; echo "<br>";
            echo $cliente->address; echo "<br>";
            echo $cliente->phone; echo "<br>";
            echo "<hr>";
        }

        
    }

}

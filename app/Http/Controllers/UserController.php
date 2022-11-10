<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function info($id_user){

        if(!Gate::allows('admin-permission')){
            abort(403,"Debes ser administrador para acceder a este método");
        }
        
        $usuario = User::find($id_user);

        return view('usuarios/infoUser', compact('usuario'));
    }
}

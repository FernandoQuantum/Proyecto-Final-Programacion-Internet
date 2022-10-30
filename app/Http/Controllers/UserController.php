<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function info($id_user){
        
        $usuario = User::find($id_user);

        return view('usuarios/infoUser', compact('usuario'));
    }
}

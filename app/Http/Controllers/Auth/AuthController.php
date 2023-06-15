<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistroRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegistroRequest $request){
        // Validar el registro
        $data = $request->validated();

        // Crear el usuario
        $user = User::Create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])

        ]);

        // Retorna una respuesta (genera y retorna token)
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function login(LoginRequest $request){
        $data = $request->validated();

        //Revisa el password
        if(!Auth::attempt($data)){
            return response([
                'errors' => ['El email o la contraseña son incorrectos']
            ], 422);
        }

        // Autentificar al usuario
        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }
    public function logout(Request $request){
        //rebocar el token
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return [
            'user' => null
        ];
    }
}

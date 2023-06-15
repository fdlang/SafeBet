<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        //buscar usuarios
        $users = User::all();

        //si no se encuentra  usuarios, retornar error
        if (!$users) {
            return response()->json(['code' => '404', 'message' => 'Users not found'], 404);
        }

        //retornar response con los usuarios
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //buscar el json en el request
        $json = json_decode(file_get_contents('php://input'), true);
        if (!is_array($json)) {
            return response()->json(['code' => '400', 'message' => 'Bad request. Http request has no data to process'], 400);
        }

        try {
            //crear usuario
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);

            //retornar response con el usuario creado
            return response()->json(['code' => '201', 'message' => 'Successfully created record', 'data' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['code' => '400', 'message' => 'Bad request. Http request has no data to process'], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        //buscar usuario segun su id
        $user = User::find($id);

        //si no se encuentra el usuario, retornar error
        if (!$user) {
            return response()->json(['code' => '404', 'message' => 'User not found'], 404);
        }

        //retornar response con el usuario
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        //buscar el json en el request
        $json = json_decode(file_get_contents('php://input'), true);
        if (!is_array($json)) {
            return response()->json(['code' => '400', 'message' => 'Bad request. Http request has no data to process'], 400);
        }

        try {
            //buscar usuario segun su id
            $user = User::find($id);

            //si no se encuentra el usuario, retornar error
            if (!$user) {
                return response()->json(['code' => '404', 'message' => 'User not found'], 404);
            } else {
                //si se encuentra el usuario, actualizarlo
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = $request->input('password');
                $user->save();

                //retornar response con el usuario actualizado
                return response()->json(['code' => '201', 'message' => 'Successfully update record', 'data' => $user], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['code' => '400', 'message' => 'Bad request. Http request has no data to process'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        //buscar usuario segun su id
        $user = User::find($id);

        //si no se encuentra el usuario, retornar error
        if (!$user) {
            return response()->json(['code' => '404', 'message' => 'User not found'], 404);
        } else {
            //si se encuentra el usuario, eliminarlo
            $user->delete();

            //retornar response con el usuario eliminado
            return response()->json(['code' => '200', 'message' => 'Successfully delete record', 'data' => $user], 200);
        }
    }
}

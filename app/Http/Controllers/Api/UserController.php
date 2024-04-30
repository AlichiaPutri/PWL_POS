<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelModel;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all()->load('level');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = UserModel::create($data);
        return response()->json($user, 201);
    }

    public function show(UserModel $user)
    {
        return UserModel::find($user)->load('level');
    }

    public function update(Request $request, UserModel $user)
    {
        $data = $request->all();
        $password = $data['password'] ?? $user->password;
        $data['password'] = $request->filled('password') ? bcrypt($request->password) : $password;
        $user->update($data);
        return UserModel::find($user)->load('level');
    }

    public function destroy(UserModel $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}
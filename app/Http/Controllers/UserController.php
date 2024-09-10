<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('user', ['user' => $user]);
    }

    public function create()
    {
        return view('adduser');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'level' => 'required|string'  // Validate level as well
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level  // Assign the level directly during creation
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return redirect(route('user'))->with('toast_success', 'Registration successful!')
            ->with('success', 'User Berhasil Dibuat !');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('user'))->with('success', 'User Berhasil Dihapus !');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Logs;

class UsersController extends Controller
{
    //
    public function index(){
        return view('admin.users.index');
    }


    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],
        ]);

        $Userz = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        Logs::create(['message' => 'Ha agregado el usuario '.$Userz->name. ' con el ID: '.$Userz->id, 'action' => 'Agregó', 'user' => $request->adminName]);
        return redirect('/admin/users')->with('message','Usuario agregado con exito.');
    }

    public function edit($userId){
        $user = User::findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    }

    
    public function destroy($userId, Request $request)
    {
        $adminName = $request->input('adminName'); 
        $user = User::findOrFail($userId);
        $user->delete();
        Logs::create(['message' => 'Ha eliminado el usuario '.$user->name. ' con el ID: '.$user->id, 'action' => 'Eliminó', 'user' => $adminName]);
        return response()->json(['success' => true, 'message' => 'Product deleted successfully'], 200);
    }

    public function update(Request $request, int $userId){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],
        ]);

        $Userz = User::findOrFail($userId);
        $Userz->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);

        Logs::create(['message' => 'Ha actualizado el usuario '.$request->name. ' con el ID: '.$Userz->id, 'action' => 'Actualizó', 'user' => $request->adminName]);

        return redirect('/admin/users')->with('message','Usuario actualizado con exito.');
    }
}

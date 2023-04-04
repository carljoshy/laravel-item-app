<?php

namespace App\Http\Controllers;


use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function storedata(Request $request){

        $validated = $request->validate([
            "role_id" => ['required'],
            "user_id" => ['required'],

        ]);
        RoleUser::create($validated);

        return back()->with('message', 'Assigned Role Successful');

    }
    public function destroy(RoleUser $role){
        $role->delete();
        return back()->with('message', 'User Role was successfully deleted');

    }
}

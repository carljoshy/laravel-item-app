<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;

class AccessController extends Controller
{
     public function storedata(Request $request){

        $validated = $request->validate([
            "role_id" => ['required'],
            "user_id" => ['required'],

        ]);
        Access::create($validated);

        return back()->with('message', 'Assigned Role Successful');

    }
    public function destroy(Access $role){
        $role->delete();
        return back()->with('message', 'User Role was successfully deleted');

    }

}

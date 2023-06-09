<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;


class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:SuperAdmin');
    //     $this->middleware('role:Admin');
    // }

    public function manage(){

        $roles = Role::all();
        // $dummy = DB::table('accesses')->select()->get();
        $access = DB::table('role_user')
        ->join('roles', 'roles.id', "=", 'role_user.role_id')
        ->join('users', 'users.id', "=", 'role_user.user_id')
        ->select('users.first_name','users.last_name','roles.name','role_user.*')->get();

        // $data = array("users" => DB::table('users')->orderByDesc('created_at')->simplePaginate(10));

        // $users = User::all();

        $users = DB::table('users')->orderByDesc('created_at')->paginate(10);


        return view('user.manage')->with('users',$users)->with('roles',$roles)->with('access',$access);

    }


    public function register(){
        return view('user.register');
    }

    public function login()
    {
        if(View::exists('user.login'))
        {
            return view('user.login');
        }else{
        return abort(404);
        }
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Succesfull');
    }
    public function process(Request $request){

        $validated = $request->validate([
            "email" => ['required','email'],
            "password" => 'required'
        ]);

        if(auth()->attempt($validated)){
            session()->regenerate();

            return redirect('/')->with('message', 'Welcom Back!');
        }

        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
    }
    public function store(Request $request){

        $validated = $request->validate([
            "first_name" => ['required'],
            "last_name" => ['required'],
            "gender" => ['required'],
            "email" => ['required','email', Rule::unique('users', 'email')],
            "password" => 'required | confirmed | '
        ]);
        $validated['password'] = Hash::make( $validated['password']);

        $user = User::create($validated);

        $user->roles()->attach(4);

        auth()->login($user);

        return redirect('/login')->with(['message' => 'New User Added Successfully']);
    }

    public function update(Request $request, User $user){

        $validated = $request->validate([
            "first_name" => ['required'],
            "last_name" => ['required'],
            "gender" => ['required'],
            "email" => ['required'],

        ]);

       $user->update($validated);

       return back()->with('message','User was successfully updated');
    }
    public function destroy(User $user){
        $user->delete();
        return back()->with('message', 'User was successfully deleted');

    }

}

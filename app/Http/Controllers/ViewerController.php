<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewerController extends Controller
{
    public function home(){

        $products = DB::table('products')->orderByDesc('created_at')->paginate(10);

        return view('viewer.home')
            ->with('products', $products)->with('message','Welcome Homiee!!!');

    }
}

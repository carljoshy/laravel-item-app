<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(){

        // $data = Students::all();

        // return view('students.index', ['students' => $data]);

        $data = array("products" => DB::table('products')->orderByDesc('created_at')->simplePaginate(12));

        return view('products.index', $data);
    }
    public function create(){
        return view('products.create')->with('title', 'Add New Product');
    }
    public function storedata(Request $request){
        $validated = $request->validate([
            "category_name" => ['required'],
            "product_name" => ['required'],
            "price" => ['required'],
        ]);

        Products::create($validated);

        return redirect('/')->with('message', 'New Product was added successfully!');
    }
    public function update(Request $request, Products $product){

        $validated = $request->validate([
            "category_name" => ['required'],
            "product_name" => ['required'],
            "price" => ['required'],

        ]);

       $product->update($validated);

       return back()->with('message',' data was successfully updated');
    }

    public function show($id){
        $data = Products::findOrFail($id);
        return view('products.index', ['products' =>  $data]);
    }
    // public function destroy(Products $product){
    //     $product->delete();
    //     return redirect('/')->with('message', ' data was deleted successfully');

    // }
}

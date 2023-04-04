<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:SuperAdmin');

    // }

    // ['products' => $data]


    public function index(){

        $categories= Categories::all();
        // $products = Products::orderByDesc('created_at')->take(10)->get();

        $products = DB::table('products')->orderByDesc('created_at')->paginate(10);
        // $categories = array("categories" => DB::table('categories')->orderByDesc('created_at'));

        return view('products.index')
            ->with('products', $products)
            ->with('categories', $categories);

            // return view('products.index')->with(array('products' =>$products, 'categories' => $categories));

    }
    public function create(){
        return view('products.create')->with('title', 'Add New Product');
    }
    public function storedata(Request $request){
        $validated = $request->validate([
            "category_name" => ['required'],
            "product_name" => ['required'],
            "stocks" => ['required'],
            "price" => ['required'],
        ]);

        Products::create($validated);

        return back()->with('message', 'New Product was added successfully!');
    }
    public function update(Request $request, Products $product){

        $validated = $request->validate([
            "category_name" => ['required'],
            "product_name" => ['required'],
            "stocks" => ['required'],
            "price" => ['required'],

        ]);

       $product->update($validated);

       return back()->with('message','Product was successfully updated');
    }

    public function show($id){
        $data = Products::findOrFail($id);
        return view('products.index', ['products' =>  $data]);
    }
    public function destroy(Products $product){
        $product->delete();
        return back()->with('message', 'Product was successfully deleted');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function category(){

        // $data = Students::all();

        // return view('students.index', ['students' => $data]);

        $data = array("categories" => DB::table('categories')->orderByDesc('created_at')->simplePaginate(10));

        return view('categories.manage_category ', $data);

    }

    public function storedata(Request $request){
        $validated = $request->validate([
            "category_name" => ['required'],
        ]);

        Categories::create($validated);

        return back()->with('message', 'New Category was added successfully!');
    }
    public function updateCategory(Request $request, Categories $category){

        $validated = $request->validate([
            "category_name" => ['required'],

        ]);

       $category->update($validated);

       return back()->with('message','Category was successfully updated');
    }
    public function destroy(Categories $category){
        $category->delete();
        return back()->with('message', 'Category was successfully deleted');

    }                                                            
}

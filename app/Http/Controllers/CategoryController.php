<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function show(){
        $list = Category::all();
        return view('category/listcategory', ['categories' => $list]);
    }

    function form($id = null){
        $category = new Category();
        if($id != null){
            $category = Category::findOrfail($id);
        }
        return view('category/form', ['category' => $category]);
    }

    function save(Request $request){

        $request->validate([
            "name"=>'required|max:50',
        ]);

        $category = new Category();

        if($request->id>0){
            $category = Category::findOrfail($request->id);
            return redirect('/categories')->with('messageupdate', 'Categoria Actualizada');
        }

        $category->name = $request->name;

        $category->save();

        return redirect('/brands')->with('message', 'Categoria Guardada');
    }

    function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('messagedelete', 'Categoria Borrada');;
    }
}

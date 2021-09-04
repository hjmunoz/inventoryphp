<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $list = Product::all();//select * from products
        return view('product/list', ['products' => $list]);

    }

    function form($id = null){
        $product = new Product();
        $categories = Category::all();
        $brands = Brand::all();
        if($id!=null){
            $product = Product::findOrfail($id);
        }
        return view('product/form',[
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

        function save(Request $request){
            //$request->name;
            //$_POST['name']
            $message = "Producto insertado";


            $request->validate([

                "name"=>'required|max:50',
                "cost"=>'required|numeric',
                "price"=>'required|numeric',
                "quantity"=>'required|numeric',
                "brand"=>'required',
            ]);

            $product = new Product();
            if($request->id > 0){
                $product = Product::findOrFail($request->id);
                $message = "Producto actualizado";
            }
            $product-> name = $request->name;
            $product-> cost = $request->cost;
            $product-> price = $request->price;
            $product-> quantity = $request->quantity;
            $product-> brand_id = $request->brand;
            $product-> category_id = $request ->category;

            $product->save();


            return redirect('/products')->with('message', $message);
        }

        //esta se usa para borrar, nos esta ayudando laravel, es como delete * from products where id = id;
        function delete($id){
            $product = Product::findOrfail($id);
            $product->delete();
            return redirect('/products')->with('messagedelete', 'Producto Borrado');;
        }
}

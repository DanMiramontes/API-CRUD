<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
      
       if(!$products){
          return response()->json([],204);
        }
        return response()->json([
            "results" => $products
        ], 200);
      
      //  return view('welcome',compact('products'));
    }



    public function store(Request $request)
    {
        $request->validate([
            "description" =>"required|string",
            "category_id" => "required",
            "store_id" => "required",
            "stock" => "required|numeric|min:0",
            "price" => "numeric|min:0"
        ]);


        $product = Product::create($request->all());

        return response()->json([
            "results" => $product 
        ], 200);  

    }


    public function show(string $id)
    {
        if(is_numeric($id)){
           $product = Product::find($id); 
           if(!$product){
              return response()->json(["message" => "NO CONTENT"]); 
           }
              return response()->json([
                "results" => $product
            ],200);


        } else{
            return response()->json(["message" => "Bad request"],400); 
        }
    }



    public function update(Request $request, string $id)
    {
        if(is_numeric($id)){
            $product = Product::find($id); 
            if(!$product){
               return response()->json(["message" => "store not found"]); 
            }
            $request->validate([
                "description" =>"required|string",
                "store_id" => "required",
                "stock" => "required|numeric|min:0",
                "price" => "numeric|min:0"
            ]);

            $product->update($request->all());
            
    
            return response()->json([
                "results" => $product
            ],200);
 
 
         } else{
             return response()->json(["message" => "Bad request"],400); 
         }
   
    }



    public function destroy(string $id)
    {
        if(is_numeric($id)){
            $product = Product::find($id);
            if(!$product){
                return response()->json(["results" => "Store not found"]);  
            }
               $product->delete();
               return response()->json([],204);
        }else{
            return response()->json(["message" => "Bad request"],400); 
        }
    }
}

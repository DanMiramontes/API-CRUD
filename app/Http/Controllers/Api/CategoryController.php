<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        if(!$category){
           return response()->json([],204);
        }
        return response()->json([
            "results" => $category
        ],200);
    }

    public function store(Request $request)
    {
       if(is_object($request)){

        $request->validate([
            "description" => "required|string"
        ]);      
         $category = Category::create([
            "description" =>$request->description
        ]);
        return response()->json([
            "results" => $category
           ], 200);      
       } else{
         return response()->json(["message" => "Bad request"],400); 
       }

    }


    public function show(string $id)
    {
        if(is_numeric($id)){
           $category = Category::find($id); 
           if(!$category){
              return response()->json(["message" => "NO CONTENT"]); 
           }
              return response()->json([
                "results" => $category
            ], 200);


        } else{
            return response()->json(["message" => "Bad request"],400); 
        }
    }




    public function update(Request $request, string $id)
    {
        if(is_numeric($id)){
            $category = Category::find($id); 
            if(!$category){
               return response()->json(["message" => "Category not found"]); 
            }
            $request->validate([
                "description" => 'required' 
            ]);

            $category->description = $request->description;
            $category->save();
    
            return response()->json([
                "results" => $category
            ], 200);
 
 
         } else{
             return response()->json(["message" => "Bad request"],400); 
         }
   
    }


    public function destroy(string $id)
    {
        if(is_numeric($id)){
            $category = Category::find($id);
            if(!$category){
                return response()->json(["results" => "Category not found"]);  
            }
               $category->delete();
               return response()->json([],204);
        }else{
            return response()->json(["message" => "Bad request"],400); 
        }
    }
}


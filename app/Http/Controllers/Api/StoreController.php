<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;


class StoreController extends Controller
{

    public function index()
    {
        $store = Store::all();
        if(!$store){
          return response()->json([],204);
        }
        return response()->json([
            "results" => $store
        ],200);
    }



    public function store(Request $request)
    {
        if(is_object($request)){
 
         $request->validate([
             "description" => "required|string"
         ]);      
          $store = Store::create([
             "description" =>$request->description
         ]);
         return response()->json([
             "results" => $store
            ],200);      
        } else{
          return response()->json(["message" => "Bad request"],400); 
        }
 
     }


    public function show(string $id)
    {
        if(is_numeric($id)){
           $store = Store::find($id); 
           if(!$store){
              return response()->json(["message" => "NO CONTENT"]); 
           }
              return response()->json([
                "results" => $store
            ],200);


        } else{
            return response()->json(["message" => "Bad request"],400); 
        }
    }

    public function update(Request $request, string $id)
    {
        if(is_numeric($id)){
            $store = Store::find($id); 
            if(!$store){
               return response()->json(["message" => "store not found"]); 
            }
            $request->validate([
                "description" => 'required' 
            ]);

            $store->description = $request->description;
            $store->save();
    
            return response()->json([
                "results" => $store
            ],200);
 
 
         } else{
             return response()->json(["message" => "Bad request"],400); 
         }
   
    }

    public function destroy(string $id)
    {
        if(is_numeric($id)){
            $store = Store::find($id);
            if(!$store){
                return response()->json(["results" => "Store not found"]);  
            }
               $store->delete();
               return response()->json([],204);
        }else{
            return response()->json(["message" => "Bad request"],400); 
        }
    }
}

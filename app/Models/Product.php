<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['description','category_id','store_id','stock','price'];


   public function categories()
   {
        return $this->belongsTo(Category::class);
   }

   public function stores()
   {
       return $this->belongsTo(Store::class);
   }

}

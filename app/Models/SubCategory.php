<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name','category_id'];

    public function products ()
    {
        return $this->hasMany(Product::class,'sub_category_id');
    }
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
}

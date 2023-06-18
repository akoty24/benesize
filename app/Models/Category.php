<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    public function products ()
    {
        return $this->hasMany(Product::class,'category_id');
    }

    public function subCategory ()
    {
        return $this->hasMany(SubCategory::class,'sub_category_id');
    }
}

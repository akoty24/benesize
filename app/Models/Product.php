<?php

namespace App\Models;
use App\Models\SubCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    public static $rules = [
        'name' => 'required|max:100',
        'description' => 'required|string',
        'min_price' => 'required|numeric|min:0',
        'max_price' => 'required|numeric|min:0',
        'increase_ratio' => 'required|numeric|min:0',
        'repeat_times' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0',
        'sub_category_id' => 'required|exists:sub_categories, id',
    ];

    protected $fillable = [
        'name',
        'description',
        'min_price',
        'price',
        'max_price',
        'increase_ratio',
        'repeat_times',
        'sub_category_id',
        'is_new',
        'is_on_sale',
        'is_new_arrival',
        'is_best_seller'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }


    public function colors(){
        return $this->belongsToMany(Color::class);
    }


    public function ProductOffer(){
        return $this->hasOne(ProductOffer::class,'product_id');
    }

    public function  colorProducts(){
        return $this->hasMany(ColorProduct::class,'product_id')->with('productColorSizes');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }


}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ColorProduct extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table='color_product';

    protected $guarded = [];

    public function color(){
     return $this->belongsTo(Color::class,'color_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id')->with('productOffer');
    }

    public function productColorSizes(){
        return $this->hasMany(ProductColorSize::class,'color_product_id')->with('size');
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

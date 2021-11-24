<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

    protected $appends = ['img_path'];

    public $translatedAttributes = ['name' , 'description'];


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Relations ..............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function images(){

        return $this->hasMany(ProductImages::class);
    }

    public function sections(){

        return $this->belongsToMany(Section::class, 'product_section');
    }

    public function favorites(){

        return $this->hasMany(Favorite::class);
    }

    public function attributes(){

        return $this->hasMany(Attribute::class);
    }




    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    function getImgPathAttribute(){

        return asset('assets/images/product/min/');
    }

    public function scopeWithCustomTrans($q){

        return $q->with('translations:name,locale,product_id');
    }

    public function scopeCustomSelect($q){

        return $q->select('products.id' , 'img', 'regular_price', 'sale_price', 'is_active');
    }


    public function scopeActive($q){

        return $q->where('is_active' , '=', 1);
    }

    public function scopeSort($q){

        return $q->orderBy('id', 'desc');
    }

}

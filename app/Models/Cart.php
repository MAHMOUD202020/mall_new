<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['img_path'];

    public $translatedAttributes = ['name' , 'description'];


    public function product(){

        return $this->belongsTo(Product::class , 'product_id');
    }

    public function options(){

        return $this->belongsToMany(Option::class , 'cart_options');
    }
    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeWhereNotInOrder($q){

        return $q->where('order_id' , null);
    }


    function getImgPathAttribute(){

        return asset('assets/images/product/min/');
    }
}

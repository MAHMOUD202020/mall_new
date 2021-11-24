<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;



    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Relations ..............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function products(){

        return $this->belongsToMany(Product::class, 'product_section');
    }

    public function product(){ // get last product to this section

        return $this->belongsTo(Product::class, 'last_product_id');
    }

    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        return $q->select('id' , 'sort' , 'wall' , 'is_active' , 'store_id' );
    }


}

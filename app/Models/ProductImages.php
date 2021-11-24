<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['gallery_path'];


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    function getGalleryPathAttribute(){

        return asset('assets/images/product/gallery/');
    }


}

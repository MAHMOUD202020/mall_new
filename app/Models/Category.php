<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

    protected $table = 'categories';

    protected $appends = ['icon_path'];

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'category_id';


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Relations ..............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////

    public function stores(){

        return $this->hasMany(Store::class);
    }

    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////

    function getIconPathAttribute(){

        return asset('assets/images/category/');
    }

    public function scopeSort($q){

        return $q->orderBy('sort', 'desc');
    }

    public function scopeCustomSelect($q){

        return $q->select('id', 'icon' , 'sort');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['src_path'];

    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        return $q->select('id', 'src', 'type',  'sort', 'section_id');
    }

    public function getSrcPathAttribute(){

        return asset('assets/images/slider/');
    }
}

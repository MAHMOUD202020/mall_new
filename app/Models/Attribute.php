<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $appends = ['name'];


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Relations ..............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function options(){

        return $this->hasMany(Option::class);
    }


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function getNameAttribute(){

        $name = "name_".app()->getLocale();

        return $this->$name;
    }
}

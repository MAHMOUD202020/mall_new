<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory, Translatable;

    protected $table = 'faq';

    protected $guarded = [];

    public $translatedAttributes = ['title' , 'text'];

    public $translationForeignKey = 'faq_id';

    public $timestamps = false;
}

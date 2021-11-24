<?php

namespace App\Models;

use App\Notifications\Store\Auth\ResetPassword;
use App\Notifications\Store\Auth\VerifyEmail;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Store extends Authenticatable
{
    use HasFactory, Notifiable, Translatable;

    public $translatedAttributes = ['name', 'welcome_message'];

    protected $appends = ['logo_path' , 'banner_path'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'phone', 'phone2',  'tag', 'logo', 'banner', 'floor', 'password', 'shipping_charges', 'welcome_message', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Relations ..............  ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function profile(){

        return $this->hasOne(StoreProfile::class);
    }

    public function faq(){

        return $this->hasMany(FAQ::class , 'store_id');
    }

    public function products(){

        return $this->hasMany(Product::class);
    }

    public function sections(){

        return $this->hasMany(Section::class)
            ->where('is_active' , 1)
            ->orderBy('sort');
    }


    public function sliders(){

        return $this->hasMany(Slider::class);
    }


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ............  Methods custom ................ ////
    ////                                               ////
    ///////////////////////////////////////////////////////



    public function scopeActive($q){

        return $q->where('is_active' , '=', 1);
    }

    public function scopeSort($q){

        return $q->latest();
    }

    public function scopeCustomSelect($q){

        return $q->select('id', 'email' , 'is_active' , 'logo', 'banner', 'position_id', 'category_id');
    }

    public function getLogoPathAttribute(){

        return asset('assets/images/store/logo/');
    }

    public function getbannerPathAttribute(){

        return asset('assets/images/store/banner/');
    }
}

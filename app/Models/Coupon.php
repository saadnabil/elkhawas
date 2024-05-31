<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $date = ['deleted_at'];

    public function couponusers(){
        return $this->hasMany(CouponUser::class);
    }

    public function users(){
        return $this->belongsToMany(User::class , 'coupon_users');
    }
}

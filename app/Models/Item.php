<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    protected $date = ['deleted_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated titles as an array
    public function getTitleAttribute($value)
    {
        return json_decode($value, true)[app()->getLocale()] ?: '';
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated description as an array
    public function getDescriptionAttribute($value)
    {
        return json_decode($value, true)[app()->getLocale()] ?: '';
    }

    public function setUnitAttribute($value)
    {
        $this->attributes['unit'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated description as an array
    public function getUnitAttribute($value)
    {
        return json_decode($value, true)[app()->getLocale()] ?: [];
    }



    public function setItemNameAttribute($value)
    {
        $this->attributes['item_name'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated titles as an array
    public function getItemNameAttribute($value)
    {
        return json_decode($value, true)[app()->getLocale()] ?: [];
    }




}

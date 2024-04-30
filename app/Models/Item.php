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

    public function wishlisted(){
        return $this->hasOne(Wishlist::class)->where('user_id', auth()->user()->id);
    }

    // Accessor to retrieve translated titles as an array
    public function getTitleAttribute($value)
    {
        return json_decode($value, true)?: '';
    }
    

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated description as an array
    public function getDescriptionAttribute($value)
    {
        return json_decode($value, true)?: '';
    }
    

    public function setUnitAttribute($value)
    {
        $this->attributes['unit'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated description as an array
    public function getUnitAttribute($value)
    {
        return json_decode($value, true)?: [];
    }
    
    // Return an empty array if the key doesn't exist or if decoding fails
    return [];
}




    public function setItemNameAttribute($value)
    {
        $this->attributes['item_name'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated titles as an array
    public function getItemNameAttribute($value)
    {
        return json_decode($value, true)?: [];
    }
    


}

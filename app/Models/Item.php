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
        // Decode the JSON value into an array
        $decodedValue = json_decode($value, true);
    
        // Check if decoding was successful and $decodedValue is an array
        if (is_array($decodedValue)) {
            // Check if the key for the current locale exists in the array
            $locale = app()->getLocale();
            if (isset($decodedValue[$locale])) {
                // Return the value for the current locale
                return $decodedValue[$locale];
            }
        }
        
        // Return an empty string if the key doesn't exist or if the value is null
        return '';
    }
    

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated description as an array
    public function getDescriptionAttribute($value)
    {
        // Decode the JSON value into an array
        $decodedValue = json_decode($value, true);
        
        // Check if decoding was successful and $decodedValue is an array
        if (is_array($decodedValue)) {
            $locale = app()->getLocale();
            
            // Check if the key for the current locale exists in the array
            if (array_key_exists($locale, $decodedValue)) {
                // Return the value for the current locale
                return $decodedValue[$locale];
            }
        }
        
        // Return an empty string if the key doesn't exist or if the value is null
        return '';
    }
    

    public function setUnitAttribute($value)
    {
        $this->attributes['unit'] = json_encode(array_map('trim', $value));
    }

    // Accessor to retrieve translated description as an array
    public function getUnitAttribute($value)
{
    // Decode the JSON value into an array
    $decodedValue = json_decode($value, true);
    
    // Check if decoding was successful and $decodedValue is an array
    if (is_array($decodedValue)) {
        $locale = app()->getLocale();
        
        // Check if the key for the current locale exists in the array
        if (array_key_exists($locale, $decodedValue)) {
            // Return the value associated with the current locale
            return $decodedValue[$locale];
        }
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
        // Decode the JSON value into an array
        $decodedValue = json_decode($value, true);
    
        // Check if decoding was successful and $decodedValue is an array
        if (is_array($decodedValue)) {
            $locale = app()->getLocale();
            // Check if the key for the current locale exists in the array
            if (array_key_exists($locale, $decodedValue)) {
                return $decodedValue[$locale];
            }
        }
        
        // Return an empty array if the key doesn't exist or if the value is null
        return [];
    }
    




}

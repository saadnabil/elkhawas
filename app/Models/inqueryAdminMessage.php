<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inqueryAdminMessage extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id', 'subject', 'message'];

   
    public function admin() {
        return $this->belongsTo(Admin::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUS extends Model
{
    use HasFactory;
    protected $fillable = [
        'text'
    ];
    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}

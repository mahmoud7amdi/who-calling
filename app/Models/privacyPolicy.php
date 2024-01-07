<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privacyPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
        'text_ar',
        'text_en'
    ];

    protected $hidden = [
      'updated_at',
      'created_at'
    ];
}

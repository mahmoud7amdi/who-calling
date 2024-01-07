<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileView extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_id',
        'visitor_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

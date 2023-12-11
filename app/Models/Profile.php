<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function views() {
        return $this->hasMany(User::class, 'profile_views', 'profile_id', 'visitor_id')
            ->withPivot('created_at');
    }
}

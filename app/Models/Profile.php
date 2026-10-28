<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'headline', 'summary', 'email', 'phone', 'address',
        'linkedin', 'github', 'skills', 'education',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePods extends Model
{
    use HasFactory;

    protected $casts = [
        'item_skill_tags' => 'array',
        'item_language' => 'array',
    ];
}

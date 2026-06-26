<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartupCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'title',
        'description',
        'icon',
        'is_featured',
        'sort_order',
        'status',
    ];
}

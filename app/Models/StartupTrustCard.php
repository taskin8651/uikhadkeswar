<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartupTrustCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'footer_icon',
        'footer_text',
        'color_class',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FounderTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'sort_order',
        'status',
    ];
}
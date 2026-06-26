<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultTestimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_text',
        'reviewer_name',
        'reviewer_type',
        'rating',
        'is_featured',
        'sort_order',
        'status',
    ];
}

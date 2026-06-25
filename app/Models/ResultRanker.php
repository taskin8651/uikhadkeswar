<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ResultRanker extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'exam_type',
        'badge_text',
        'student_name',
        'description',
        'icon',
        'meta_one_label',
        'meta_one_value',
        'meta_two_label',
        'meta_two_value',
        'is_featured',
        'sort_order',
        'status',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('ranker_image')
            ->singleFile();
    }
}

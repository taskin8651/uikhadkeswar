<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FounderSection extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'image_alt',
        'founder_name',
        'qualification',
        'designation',
        'hero_title',
        'hero_highlight_text',
        'hero_description',
        'education_value',
        'designation_value',
        'company_value',
        'location_value',
        'status',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('founder_image')
            ->singleFile();
    }
}
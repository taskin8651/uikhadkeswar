<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FacultyMember extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'subject',
        'badge',
        'description',
        'point_one',
        'point_two',
        'point_three',
        'image_alt',
        'fallback_image',
        'is_active',
        'sort_order',
        'status',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('faculty_image')->singleFile();
    }

    public function imageUrl(): ?string
    {
        return $this->getFirstMediaUrl('faculty_image') ?: $this->fallback_image;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GalleryItem extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'label',
        'alt_text',
        'media_type',
        'source_url',
        'thumbnail_url',
        'category_slugs',
        'layout',
        'sort_order',
        'status',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery_media')->singleFile();
        $this->addMediaCollection('gallery_thumbnail')->singleFile();
    }

    public function mediaSource(): ?string
    {
        return $this->getFirstMediaUrl('gallery_media')
            ?: ($this->source_url ?: $this->thumbnailSource());
    }

    public function thumbnailSource(): ?string
    {
        return $this->getFirstMediaUrl('gallery_thumbnail')
            ?: $this->getFirstMediaUrl('gallery_media')
            ?: ($this->thumbnail_url ?: $this->source_url);
    }
}
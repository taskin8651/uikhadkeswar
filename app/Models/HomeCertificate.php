<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeCertificate extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'year_text',
        'alt_text',
        'image_path',
        'button_text',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certificate_image')->singleFile();
    }

    public function imageUrl(): ?string
    {
        return $this->getFirstMediaUrl('certificate_image')
            ?: ($this->image_path ? asset($this->image_path) : null);
    }
}

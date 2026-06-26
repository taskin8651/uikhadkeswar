<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ResourceItem extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'category_slugs',
        'badge_text',
        'icon',
        'meta_one_icon',
        'meta_one_text',
        'meta_two_icon',
        'meta_two_text',
        'button_text',
        'button_icon',
        'link_type',
        'route_name',
        'custom_url',
        'is_featured',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('resource_file')->singleFile();
    }

    public function buttonUrl(): string
    {
        if ($this->link_type === 'file') {
            return $this->getFirstMediaUrl('resource_file') ?: '#';
        }

        if ($this->link_type === 'route' && $this->route_name && \Route::has($this->route_name)) {
            return route($this->route_name);
        }

        return $this->custom_url ?: '#';
    }

    public static function frontendRoutes(): array
    {
        return [
            'frontend.resources' => 'Resources',
            'frontend.admission' => 'Admission',
            'frontend.test-series' => 'Test Series',
            'frontend.scholarship' => 'Scholarship Exam',
            'frontend.neet-program' => 'NEET Program',
            'frontend.jee-program' => 'JEE Program',
            'frontend.foundation-course' => 'Foundation Course',
            'frontend.courses' => 'Courses',
            'frontend.results' => 'Results',
            'frontend.gallery' => 'Gallery',
            'frontend.contact' => 'Contact',
        ];
    }
}

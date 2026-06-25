<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPageContent extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'hero_title',
        'hero_highlight_text',
        'hero_description',
        'hero_tag_one',
        'hero_tag_two',
        'hero_tag_three',
        'hero_tag_four',
        'hero_image_alt',
        'hero_focus_label',
        'hero_focus_title',
        'hero_focus_description',
        'hero_stat_one_value',
        'hero_stat_one_label',
        'hero_stat_two_value',
        'hero_stat_two_label',

        'intro_heading',
        'intro_description',
        'intro_card_title',
        'intro_card_description',
        'intro_quote_text',
        'intro_quote_author',
        'intro_core_one_title',
        'intro_core_one_description',
        'intro_core_two_title',
        'intro_core_two_description',
        'intro_core_three_title',
        'intro_core_three_description',
        'intro_core_four_title',
        'intro_core_four_description',

        'vm_heading',
        'vm_description',
        'vision_title',
        'vision_description',
        'mission_title',
        'mission_description',
        'future_title',
        'future_description',

        'method_heading',
        'method_description',
        'method_note',
        'method_one_title',
        'method_one_description',
        'method_two_title',
        'method_two_description',
        'method_three_title',
        'method_three_description',
        'method_four_title',
        'method_four_description',

        'support_heading',
        'support_description',
        'support_highlight_title',
        'support_highlight_description',
        'support_one_title',
        'support_one_description',
        'support_two_title',
        'support_two_description',
        'support_three_title',
        'support_three_description',
        'support_four_title',
        'support_four_description',

        'status',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_hero_image')->singleFile();
    }
}
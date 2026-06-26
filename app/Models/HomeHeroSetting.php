<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeHeroSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'hero_title_top',
        'hero_title_highlight',
        'hero_title_bottom',
        'hero_description',
        'hero_strong_text',
        'hero_image_alt',
        'feature_one_title',
        'feature_one_subtitle',
        'feature_two_title',
        'feature_two_subtitle',
        'feature_three_title',
        'feature_three_subtitle',
        'stat_one_value',
        'stat_one_label',
        'stat_two_value',
        'stat_two_label',
        'stat_three_value',
        'stat_three_label',
        'stat_four_value',
        'stat_four_label',
        'classroom_image_alt',
        'year_card_value',
        'year_card_label',
        'ai_card_title',
        'ai_card_subtitle',
        'classroom_feature_one_title',
        'classroom_feature_one_subtitle',
        'classroom_feature_two_title',
        'classroom_feature_two_subtitle',
        'classroom_feature_three_title',
        'classroom_feature_three_subtitle',
        'classroom_feature_four_title',
        'classroom_feature_four_subtitle',
        'counselling_title',
        'counselling_description',
        'counselling_point_one',
        'counselling_point_two',
        'counselling_point_three',
        'trust_heading',
        'trust_one_title',
        'trust_one_subtitle',
        'trust_two_title',
        'trust_two_subtitle',
        'trust_three_title',
        'trust_three_subtitle',
        'trust_four_title',
        'trust_four_subtitle',
        'trust_five_title',
        'trust_five_subtitle',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_image')->singleFile();
        $this->addMediaCollection('classroom_image')->singleFile();
    }

    public static function defaults(): array
    {
        return [
            'hero_title_top' => 'Future-Ready',
            'hero_title_highlight' => 'NEET & JEE Learning',
            'hero_title_bottom' => 'for Rural India',
            'hero_description' => 'Affordable coaching, personal mentorship and AI-powered test analytics for',
            'hero_strong_text' => 'every aspirant.',
            'hero_image_alt' => 'Khadkeshwar Academy NEET and JEE students',
            'feature_one_title' => 'Personal Mentorship',
            'feature_one_subtitle' => 'One-to-one guidance',
            'feature_two_title' => 'AI Test Analytics',
            'feature_two_subtitle' => 'Smart performance insights',
            'feature_three_title' => 'Scholarship Support',
            'feature_three_subtitle' => 'For deserving students',
            'stat_one_value' => '500+',
            'stat_one_label' => 'Students Mentored<br>and Growing',
            'stat_two_value' => '15+',
            'stat_two_label' => 'Rural Villages<br>Connected',
            'stat_three_value' => '1000+',
            'stat_three_label' => 'AI Tests<br>Analysed',
            'stat_four_value' => '50%+',
            'stat_four_label' => 'Scholarship Support<br>Available',
            'classroom_image_alt' => 'Khadkeshwar Academy classroom',
            'year_card_value' => '2026',
            'year_card_label' => 'Admissions Open',
            'ai_card_title' => 'AI Learning',
            'ai_card_subtitle' => 'Coming Soon',
            'classroom_feature_one_title' => 'Expert Faculty',
            'classroom_feature_one_subtitle' => 'Experienced and dedicated mentors',
            'classroom_feature_two_title' => 'AI Performance Tracking',
            'classroom_feature_two_subtitle' => 'Smart insights for better results',
            'classroom_feature_three_title' => 'Weekly Test Series',
            'classroom_feature_three_subtitle' => 'Practice · Analyse · Improve',
            'classroom_feature_four_title' => 'Scholarship Program',
            'classroom_feature_four_subtitle' => 'For deserving rural students',
            'counselling_title' => 'Book Free Career Counselling',
            'counselling_description' => 'Get your personalized NEET/JEE preparation roadmap from our expert counsellors.',
            'counselling_point_one' => 'Free Guidance',
            'counselling_point_two' => 'No Commitment',
            'counselling_point_three' => 'Expert Advice',
            'trust_heading' => 'Why Parents & Students Trust Us',
            'trust_one_title' => 'Proven Results',
            'trust_one_subtitle' => 'Consistent student success',
            'trust_two_title' => 'Affordable Fees',
            'trust_two_subtitle' => 'Quality education for all',
            'trust_three_title' => 'Safe & Supportive',
            'trust_three_subtitle' => 'Positive learning environment',
            'trust_four_title' => 'Technology Driven',
            'trust_four_subtitle' => 'AI for better outcomes',
            'trust_five_title' => 'Rural Focus',
            'trust_five_subtitle' => 'Building future leaders',
            'status' => true,
        ];
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1], static::defaults());
    }
}

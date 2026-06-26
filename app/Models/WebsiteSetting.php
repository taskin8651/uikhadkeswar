<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'site_name',
        'site_tagline',
        'logo_alt',
        'footer_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots',
        'og_title',
        'og_description',
        'twitter_title',
        'twitter_description',
        'twitter_card',
        'phone_primary',
        'phone_secondary',
        'whatsapp_number',
        'email_primary',
        'email_secondary',
        'address',
        'google_map_link',
        'map_embed_url',
        'working_hours',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'x_url',
        'telegram_url',
        'company_name',
        'gstin',
        'cin',
        'pan',
        'tan',
        'admission_badge_text',
        'copyright_text',
        'google_analytics_id',
        'google_tag_manager_id',
        'facebook_pixel_id',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        foreach (['logo', 'footer_logo', 'favicon', 'apple_touch_icon', 'og_image', 'twitter_image'] as $collection) {
            $this->addMediaCollection($collection)->singleFile();
        }
    }

    public static function defaults(): array
    {
        return [
            'site_name' => 'Khadkeshwar NEET JEE Academy',
            'site_tagline' => 'AI Education Platform for Rural India',
            'logo_alt' => 'Khadkeshwar NEET JEE Academy Logo',
            'footer_description' => 'Khadkeshwar Academy is a rural-first AI education platform building a national learning brand for NEET & JEE aspirants through technology, mentorship and quality teaching.',
            'meta_title' => 'Khadkeshwar NEET JEE Academy Lonar | NEET & JEE Learning',
            'meta_description' => 'Khadkeshwar NEET JEE Academy, Lonar offers NEET, JEE and Foundation coaching with personal guidance, test series, affordable learning and future AI-enabled learning plans.',
            'meta_keywords' => 'NEET Coaching Lonar, JEE Coaching Lonar, Khadkeshwar Academy, Foundation Course, Test Series',
            'robots' => 'index, follow',
            'twitter_card' => 'summary_large_image',
            'phone_primary' => '+91 88568 22032',
            'whatsapp_number' => '+91 88568 22032',
            'email_primary' => 'info@khadkeshwaracademy.com',
            'address' => 'Lonar, Buldhana, Maharashtra, India',
            'working_hours' => 'Mon - Sat, 9:00 AM - 7:00 PM',
            'company_name' => 'Khadkeshwar Development Services Pvt Ltd',
            'gstin' => '27AAMCK749F1ZY',
            'cin' => 'U85500ME2026PTC474210',
            'pan' => 'AAMCK7494F',
            'tan' => 'NQPK07435B',
            'admission_badge_text' => 'Admission Open 2026',
            'copyright_text' => '© 2026 Khadkeshwar NEET JEE Academy. All Rights Reserved.',
            'status' => true,
        ];
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1], static::defaults());
    }

    public function mediaUrl(string $collection, ?string $fallback = null): ?string
    {
        return $this->getFirstMediaUrl($collection) ?: $fallback;
    }

    public function cleanPhone(?string $value = null): string
    {
        return preg_replace('/\D+/', '', $value ?? $this->phone_primary ?? '');
    }

    public function telLink(?string $value = null): string
    {
        $phone = $value ?? $this->phone_primary;

        return $phone ? 'tel:' . preg_replace('/\s+/', '', $phone) : '#';
    }

    public function mailLink(?string $value = null): string
    {
        $email = $value ?? $this->email_primary;

        return $email ? 'mailto:' . $email : '#';
    }

    public function whatsappLink(?string $message = null): string
    {
        $number = $this->cleanPhone($this->whatsapp_number ?: $this->phone_primary);

        if (! $number) {
            return '#';
        }

        $url = 'https://wa.me/' . $number;

        if ($message) {
            $url .= '?text=' . urlencode($message);
        }

        return $url;
    }
}

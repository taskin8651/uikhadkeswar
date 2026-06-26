<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = WebsiteSetting::current();

        return view('admin.website-settings.edit', compact('websiteSetting'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('website_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = WebsiteSetting::current();

        $data = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'site_tagline' => ['nullable', 'string', 'max:255'],
            'logo_alt' => ['nullable', 'string', 'max:255'],
            'footer_description' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'canonical_url' => ['nullable', 'url', 'max:255'],
            'robots' => ['nullable', 'string', 'max:255'],
            'og_title' => ['nullable', 'string', 'max:255'],
            'og_description' => ['nullable', 'string'],
            'twitter_title' => ['nullable', 'string', 'max:255'],
            'twitter_description' => ['nullable', 'string'],
            'twitter_card' => ['nullable', 'string', 'max:255'],
            'phone_primary' => ['nullable', 'string', 'max:30'],
            'phone_secondary' => ['nullable', 'string', 'max:30'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'email_primary' => ['nullable', 'email', 'max:255'],
            'email_secondary' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'google_map_link' => ['nullable', 'url', 'max:255'],
            'map_embed_url' => ['nullable', 'string'],
            'working_hours' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'youtube_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'x_url' => ['nullable', 'url', 'max:255'],
            'telegram_url' => ['nullable', 'url', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'gstin' => ['nullable', 'string', 'max:255'],
            'cin' => ['nullable', 'string', 'max:255'],
            'pan' => ['nullable', 'string', 'max:255'],
            'tan' => ['nullable', 'string', 'max:255'],
            'admission_badge_text' => ['nullable', 'string', 'max:255'],
            'copyright_text' => ['nullable', 'string'],
            'google_analytics_id' => ['nullable', 'string', 'max:255'],
            'google_tag_manager_id' => ['nullable', 'string', 'max:255'],
            'facebook_pixel_id' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'boolean'],
            'logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'footer_logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'favicon' => ['nullable', 'file', 'mimes:ico,png,jpg,jpeg,webp,svg', 'max:1024'],
            'apple_touch_icon' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp', 'max:1024'],
            'og_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'twitter_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data['status'] = $request->boolean('status');

        foreach (['logo', 'footer_logo', 'favicon', 'apple_touch_icon', 'og_image', 'twitter_image'] as $mediaField) {
            unset($data[$mediaField]);
        }

        $websiteSetting->update($data);

        foreach (['logo', 'footer_logo', 'favicon', 'apple_touch_icon', 'og_image', 'twitter_image'] as $mediaField) {
            if ($request->hasFile($mediaField)) {
                $websiteSetting
                    ->addMediaFromRequest($mediaField)
                    ->toMediaCollection($mediaField);
            }
        }

        return redirect()
            ->route('admin.website-settings.edit')
            ->with('message', 'Website settings updated successfully.');
    }
}

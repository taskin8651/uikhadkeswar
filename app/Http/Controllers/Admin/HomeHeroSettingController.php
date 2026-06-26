<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HomeHeroSettingController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('home_hero_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeHeroSetting = HomeHeroSetting::current();

        return view('admin.home-hero-settings.edit', compact('homeHeroSetting'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('home_hero_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeHeroSetting = HomeHeroSetting::current();

        $rules = [];

        foreach (array_keys(HomeHeroSetting::defaults()) as $field) {
            $rules[$field] = $field === 'status' ? ['nullable', 'boolean'] : ['nullable', 'string'];
        }

        $rules['hero_image'] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];
        $rules['classroom_image'] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];

        $data = $request->validate($rules);
        $data['status'] = $request->boolean('status');

        unset($data['hero_image'], $data['classroom_image']);

        $homeHeroSetting->update($data);

        foreach (['hero_image', 'classroom_image'] as $mediaField) {
            if ($request->hasFile($mediaField)) {
                $homeHeroSetting->addMediaFromRequest($mediaField)->toMediaCollection($mediaField);
            }
        }

        return redirect()
            ->route('admin.home-hero-settings.edit')
            ->with('message', 'Home hero section updated successfully.');
    }
}

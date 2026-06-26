<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\WebsiteSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_tagline')->nullable();
            $table->string('logo_alt')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_card')->nullable();
            $table->string('phone_primary')->nullable();
            $table->string('phone_secondary')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email_primary')->nullable();
            $table->string('email_secondary')->nullable();
            $table->text('address')->nullable();
            $table->string('google_map_link')->nullable();
            $table->text('map_embed_url')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('company_name')->nullable();
            $table->string('gstin')->nullable();
            $table->string('cin')->nullable();
            $table->string('pan')->nullable();
            $table->string('tan')->nullable();
            $table->string('admission_badge_text')->nullable();
            $table->text('copyright_text')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->string('google_tag_manager_id')->nullable();
            $table->string('facebook_pixel_id')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        WebsiteSetting::query()->create(WebsiteSetting::defaults());

        $permissions = collect([
            'website_setting_access',
            'website_setting_edit',
        ])->map(fn ($title) => ['title' => $title])->all();

        Permission::insert($permissions);

        $role = Role::find(1);

        if ($role) {
            $permissionIds = Permission::whereIn('title', array_column($permissions, 'title'))->pluck('id');
            $role->permissions()->syncWithoutDetaching($permissionIds);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('website_settings');

        $permissionIds = Permission::whereIn('title', [
            'website_setting_access',
            'website_setting_edit',
        ])->pluck('id');

        foreach (Role::all() as $role) {
            $role->permissions()->detach($permissionIds);
        }

        Permission::whereIn('id', $permissionIds)->delete();
    }
};

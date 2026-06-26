<?php

use App\Models\HomeHeroSetting;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_hero_settings', function (Blueprint $table) {
            $table->id();
            foreach (array_keys(HomeHeroSetting::defaults()) as $field) {
                if ($field === 'status') {
                    $table->boolean($field)->default(true);
                } elseif (str_contains($field, 'description') || str_contains($field, 'label')) {
                    $table->text($field)->nullable();
                } else {
                    $table->string($field)->nullable();
                }
            }
            $table->timestamps();
        });

        HomeHeroSetting::query()->create(HomeHeroSetting::defaults());

        $permissions = ['home_hero_setting_access', 'home_hero_setting_edit'];

        foreach ($permissions as $permissionTitle) {
            $permission = Permission::create(['title' => $permissionTitle]);
            $role = Role::find(1);

            if ($role) {
                $role->permissions()->syncWithoutDetaching($permission->id);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('home_hero_settings');

        $permissionIds = Permission::whereIn('title', [
            'home_hero_setting_access',
            'home_hero_setting_edit',
        ])->pluck('id');

        foreach (Role::all() as $role) {
            $role->permissions()->detach($permissionIds);
        }

        Permission::whereIn('id', $permissionIds)->delete();
    }
};

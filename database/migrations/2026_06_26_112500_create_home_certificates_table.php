<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('year_text')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('image_path')->nullable();
            $table->string('button_text')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $certificates = [
            ['Government free coaching support certificate', 'assets/img/certificate-1.jpeg', 1],
            ['Government scholarship certificate', 'assets/img/certificate-2.jpeg', 2],
            ['Student free coaching support certificate', 'assets/img/certificate-3.jpeg', 3],
            ['Rural student scholarship support certificate', 'assets/img/certificate-4.jpeg', 4],
        ];

        foreach ($certificates as [$altText, $imagePath, $sortOrder]) {
            DB::table('home_certificates')->insert([
                'title' => 'Free Coaching Support Certificate',
                'subtitle' => 'Government Scholarship Initiative',
                'year_text' => 'Academic Year 2025-26',
                'alt_text' => $altText,
                'image_path' => $imagePath,
                'button_text' => 'View Certificate',
                'sort_order' => $sortOrder,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $permissions = [
            'home_certificate_create',
            'home_certificate_edit',
            'home_certificate_delete',
            'home_certificate_access',
        ];

        foreach ($permissions as $permissionTitle) {
            $permissionId = DB::table('permissions')->insertGetId(['title' => $permissionTitle]);

            DB::table('permission_role')->insertOrIgnore([
                'permission_id' => $permissionId,
                'role_id' => 1,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('home_certificates');

        $permissionIds = Permission::whereIn('title', [
            'home_certificate_create',
            'home_certificate_edit',
            'home_certificate_delete',
            'home_certificate_access',
        ])->pluck('id');

        foreach (Role::all() as $role) {
            $role->permissions()->detach($permissionIds);
        }

        Permission::whereIn('id', $permissionIds)->delete();
    }
};

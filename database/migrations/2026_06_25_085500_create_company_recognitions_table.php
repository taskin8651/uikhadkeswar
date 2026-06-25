<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_recognitions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $now = now();

        DB::table('company_recognitions')->insert([
            [
                'title' => 'ISO 9001:2015 Certified Institute',
                'description' => 'Quality-focused education process and organized academic support system.',
                'icon' => 'bi bi-shield-check',
                'sort_order' => 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Trademark Registered',
                'description' => 'Khadkeshwar NEET/JEE Academy brand identity and recognition.',
                'icon' => 'bi bi-patch-check-fill',
                'sort_order' => 2,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Startup India Recognized Startup',
                'description' => 'Rural education and EdTech startup vision for future learning growth.',
                'icon' => 'bi bi-rocket-takeoff-fill',
                'sort_order' => 3,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'DPIIT Recognition',
                'description' => 'Startup-focused recognition roadmap and future-ready education mission.',
                'icon' => 'bi bi-stars',
                'sort_order' => 4,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        foreach ([
            'company_recognition_create',
            'company_recognition_edit',
            'company_recognition_delete',
            'company_recognition_access',
        ] as $permissionTitle) {
            $permissionId = DB::table('permissions')->where('title', $permissionTitle)->value('id');

            if (! $permissionId) {
                $permissionId = DB::table('permissions')->insertGetId([
                    'title' => $permissionTitle,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            $exists = DB::table('permission_role')
                ->where('role_id', 1)
                ->where('permission_id', $permissionId)
                ->exists();

            if (! $exists) {
                DB::table('permission_role')->insert([
                    'role_id' => 1,
                    'permission_id' => $permissionId,
                ]);
            }
        }
    }

    public function down(): void
    {
        $permissionIds = DB::table('permissions')
            ->whereIn('title', [
                'company_recognition_create',
                'company_recognition_edit',
                'company_recognition_delete',
                'company_recognition_access',
            ])
            ->pluck('id');

        DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('company_recognitions');
    }
};

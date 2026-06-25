<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_why_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $now = now();

        DB::table('about_why_items')->insert([
            [
                'title' => 'Experienced Faculty',
                'description' => 'Subject-focused teaching for NEET, JEE and Foundation preparation.',
                'icon' => 'bi bi-person-workspace',
                'sort_order' => 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Rural-First Model',
                'description' => 'Focused on helping rural students access quality preparation locally.',
                'icon' => 'bi bi-people-fill',
                'sort_order' => 2,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Affordable Learning',
                'description' => 'Fee support and concession options for eligible students.',
                'icon' => 'bi bi-wallet2',
                'sort_order' => 3,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Progress Tracking',
                'description' => 'Regular test practice and improvement-based academic support.',
                'icon' => 'bi bi-graph-up-arrow',
                'sort_order' => 4,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Parent Trust',
                'description' => 'Transparent communication and disciplined student environment.',
                'icon' => 'bi bi-chat-quote-fill',
                'sort_order' => 5,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Future AI Vision',
                'description' => 'Phase 2 roadmap includes AI-enabled learning support.',
                'icon' => 'bi bi-cpu-fill',
                'sort_order' => 6,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        $permissions = [
            'about_why_item_create',
            'about_why_item_edit',
            'about_why_item_delete',
            'about_why_item_access',
        ];

        foreach ($permissions as $permissionTitle) {
            $permissionId = DB::table('permissions')->where('title', $permissionTitle)->value('id');

            if (! $permissionId) {
                $permissionId = DB::table('permissions')->insertGetId([
                    'title' => $permissionTitle,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            if (Schema::hasTable('permission_role')) {
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
    }

    public function down(): void
    {
        $permissionIds = DB::table('permissions')
            ->whereIn('title', [
                'about_why_item_create',
                'about_why_item_edit',
                'about_why_item_delete',
                'about_why_item_access',
            ])
            ->pluck('id');

        if (Schema::hasTable('permission_role')) {
            DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        }

        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('about_why_items');
    }
};

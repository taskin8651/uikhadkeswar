<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('startup_cards', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $now = now();
        $cards = [
            ['overview', 'Rural-First Education', 'Focused on supporting students from rural and semi-urban regions with quality guidance.', 'bi bi-people-fill', false, 1],
            ['overview', 'Affordable Learning Mission', 'Designed to make NEET/JEE coaching more accessible through support and concession programs.', 'bi bi-cash-coin', true, 2],
            ['overview', 'Personal Mentorship', 'Student-focused mentorship, regular assessment and guidance-led academic improvement.', 'bi bi-person-check-fill', false, 3],
            ['overview', 'Future AI Learning', 'Phase 2 plan includes smart test analysis, progress tracking and personalized learning support.', 'bi bi-robot', false, 4],
            ['roadmap', 'Phase 1: Website Development', 'Professional website, public pages, gallery, founder story, course details and admission inquiry.', 'bi bi-window-stack', false, 1],
            ['roadmap', 'Student Admission System', 'Admission inquiry forms, contact support, course guidance and fee concession communication.', 'bi bi-person-lines-fill', true, 2],
            ['roadmap', 'Academy Media & Trust', 'Gallery, videos, testimonials, result placeholders and academic achievement sections.', 'bi bi-images', false, 3],
            ['roadmap', 'Phase 2: AI Learning Platform', 'Future plan for personalized paths, smart test analysis, weak-topic tracking and dashboards.', 'bi bi-robot', false, 4],
        ];

        foreach ($cards as $card) {
            DB::table('startup_cards')->insert([
                'section' => $card[0],
                'title' => $card[1],
                'description' => $card[2],
                'icon' => $card[3],
                'is_featured' => $card[4],
                'sort_order' => $card[5],
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        foreach (['startup_card_create', 'startup_card_edit', 'startup_card_delete', 'startup_card_access'] as $permissionTitle) {
            $permissionId = DB::table('permissions')->where('title', $permissionTitle)->value('id');

            if (! $permissionId) {
                $permissionId = DB::table('permissions')->insertGetId([
                    'title' => $permissionTitle,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            if (! DB::table('permission_role')->where('role_id', 1)->where('permission_id', $permissionId)->exists()) {
                DB::table('permission_role')->insert(['role_id' => 1, 'permission_id' => $permissionId]);
            }
        }
    }

    public function down(): void
    {
        $permissionIds = DB::table('permissions')
            ->whereIn('title', ['startup_card_create', 'startup_card_edit', 'startup_card_delete', 'startup_card_access'])
            ->pluck('id');

        DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('startup_cards');
    }
};

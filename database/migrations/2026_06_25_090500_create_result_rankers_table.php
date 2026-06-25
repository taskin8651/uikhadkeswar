<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('result_rankers', function (Blueprint $table) {
            $table->id();
            $table->string('exam_type');
            $table->string('badge_text');
            $table->string('student_name');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('meta_one_label')->nullable();
            $table->string('meta_one_value')->nullable();
            $table->string('meta_two_label')->nullable();
            $table->string('meta_two_value')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $now = now();

        DB::table('result_rankers')->insert([
            [
                'exam_type' => 'NEET',
                'badge_text' => 'Top Performer',
                'student_name' => 'Student Name',
                'description' => 'NEET achievement details will be added after result confirmation.',
                'icon' => 'bi bi-person-fill',
                'meta_one_label' => 'Score',
                'meta_one_value' => 'Update Soon',
                'meta_two_label' => 'Year',
                'meta_two_value' => '2026',
                'is_featured' => false,
                'sort_order' => 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'exam_type' => 'JEE',
                'badge_text' => 'Selected Student',
                'student_name' => 'Student Name',
                'description' => 'JEE performance details can be updated in this card later.',
                'icon' => 'bi bi-person-fill',
                'meta_one_label' => 'Rank',
                'meta_one_value' => 'Update Soon',
                'meta_two_label' => 'Year',
                'meta_two_value' => '2026',
                'is_featured' => true,
                'sort_order' => 2,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'exam_type' => 'Foundation',
                'badge_text' => 'Academic Growth',
                'student_name' => 'Student Name',
                'description' => 'Foundation progress or school result details can be added here.',
                'icon' => 'bi bi-person-fill',
                'meta_one_label' => 'Growth',
                'meta_one_value' => 'Excellent',
                'meta_two_label' => 'Year',
                'meta_two_value' => '2026',
                'is_featured' => false,
                'sort_order' => 3,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        foreach ([
            'result_ranker_create',
            'result_ranker_edit',
            'result_ranker_delete',
            'result_ranker_access',
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
                'result_ranker_create',
                'result_ranker_edit',
                'result_ranker_delete',
                'result_ranker_access',
            ])
            ->pluck('id');

        DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('result_rankers');
    }
};

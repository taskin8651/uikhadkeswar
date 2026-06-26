<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('result_testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('review_text');
            $table->string('reviewer_name');
            $table->string('reviewer_type')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $now = now();

        DB::table('result_testimonials')->insert([
            [
                'review_text' => 'The academy focuses on regular practice, doubt support and personal guidance. This type of support helps students stay consistent.',
                'reviewer_name' => 'Student Review',
                'reviewer_type' => 'NEET / JEE Aspirant',
                'rating' => 5,
                'is_featured' => false,
                'sort_order' => 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'review_text' => 'Personal mentoring and test analysis are very important for competitive exam preparation. The academy approach is student-focused.',
                'reviewer_name' => 'Parent Review',
                'reviewer_type' => 'Student Parent',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 2,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'review_text' => 'A good result journey starts with strong concepts, revision and regular tests. The academy gives direction for focused preparation.',
                'reviewer_name' => 'Academic Feedback',
                'reviewer_type' => 'Foundation Student',
                'rating' => 5,
                'is_featured' => false,
                'sort_order' => 3,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        foreach ([
            'result_testimonial_create',
            'result_testimonial_edit',
            'result_testimonial_delete',
            'result_testimonial_access',
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
                'result_testimonial_create',
                'result_testimonial_edit',
                'result_testimonial_delete',
                'result_testimonial_access',
            ])
            ->pluck('id');

        DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('result_testimonials');
    }
};

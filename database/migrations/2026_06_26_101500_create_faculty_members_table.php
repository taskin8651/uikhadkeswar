<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faculty_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subject');
            $table->string('badge')->nullable();
            $table->text('description')->nullable();
            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('fallback_image', 500)->nullable();
            $table->boolean('is_active')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $now = now();
        $members = [
            ['Faculty Name', 'Biology Faculty', 'NEET', 'Focused on NCERT clarity, diagrams, concept revision and NEET Biology practice.', 'Botany & Zoology Support', 'NCERT-Based Preparation', 'Revision & Test Guidance', 'Biology faculty at Khadkeshwar Academy', 'assets/img/faculty-1.jpg', false],
            ['Faculty Name', 'Physics Faculty', 'NEET / JEE', 'Helps students understand concepts, formulas, numericals and application-based questions.', 'Concept + Numerical Practice', 'Doubt Solving Sessions', 'Mock Test Improvement', 'Physics faculty at Khadkeshwar Academy', 'assets/img/faculty-2.jpg', true],
            ['Faculty Name', 'Chemistry Faculty', 'NEET / JEE', 'Covers Physical, Organic and Inorganic Chemistry with regular practice and revision.', 'Organic Reaction Practice', 'Physical Chemistry Numericals', 'Inorganic Revision', 'Chemistry faculty at Khadkeshwar Academy', 'assets/img/faculty-3.jpg', false],
            ['Faculty Name', 'Mathematics Faculty', 'JEE', 'Supports JEE and Foundation students with formulas, problem solving and practice plans.', 'JEE Problem Practice', 'Formula Revision', 'Step-by-Step Solutions', 'Mathematics faculty at Khadkeshwar Academy', 'assets/img/faculty-4.jpg', false],
            ['Faculty Name', 'Foundation Faculty', 'Foundation', 'Builds early academic base for students preparing for future NEET/JEE competition.', 'Basic Concept Building', 'School + Competitive Support', 'Regular Practice Habit', 'Foundation faculty at Khadkeshwar Academy', 'assets/img/faculty-5.jpg', false],
            ['Faculty Name', 'Academic Mentor', 'Mentor', 'Guides students with study planning, discipline, revision tracking and confidence building.', 'Study Plan Support', 'Progress Monitoring', 'Parent/Student Guidance', 'Academic mentor at Khadkeshwar Academy', 'assets/img/faculty-6.jpg', true],
        ];

        foreach ($members as $index => $member) {
            DB::table('faculty_members')->insert([
                'name' => $member[0],
                'subject' => $member[1],
                'badge' => $member[2],
                'description' => $member[3],
                'point_one' => $member[4],
                'point_two' => $member[5],
                'point_three' => $member[6],
                'image_alt' => $member[7],
                'fallback_image' => $member[8],
                'is_active' => $member[9],
                'sort_order' => $index + 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        foreach (['faculty_member_create', 'faculty_member_edit', 'faculty_member_delete', 'faculty_member_access'] as $permissionTitle) {
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
            ->whereIn('title', ['faculty_member_create', 'faculty_member_edit', 'faculty_member_delete', 'faculty_member_access'])
            ->pluck('id');

        DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('faculty_members');
    }
};

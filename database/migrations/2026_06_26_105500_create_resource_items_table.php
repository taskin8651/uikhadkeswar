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
        Schema::create('resource_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('category_slugs')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('icon')->nullable();
            $table->string('meta_one_icon')->nullable();
            $table->string('meta_one_text')->nullable();
            $table->string('meta_two_icon')->nullable();
            $table->string('meta_two_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_icon')->nullable();
            $table->string('link_type')->default('custom');
            $table->string('route_name')->nullable();
            $table->string('custom_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $items = [
            ['NEET Biology NCERT Revision Notes', 'Placeholder for chapter-wise Biology notes, diagrams, key points and quick revision support.', 'study downloads', 'PDF Notes', 'bi bi-file-earmark-pdf-fill', 'bi bi-calendar2-check', 'Update Ready', 'bi bi-download', 'PDF', 'Download PDF', 'bi bi-arrow-down-circle-fill', 'file', null, null, false, 1],
            ['Physics Formula Sheet for NEET/JEE', 'Formula and concept revision sheet placeholder for Physics numerical practice and revision.', 'study downloads', 'Physics', 'bi bi-lightning-charge-fill', 'bi bi-calendar2-check', 'Update Ready', 'bi bi-download', 'PDF', 'Download PDF', 'bi bi-arrow-down-circle-fill', 'file', null, null, true, 2],
            ['Chemistry Quick Revision Guide', 'Placeholder for Organic, Inorganic and Physical Chemistry revision material.', 'study downloads', 'Chemistry', 'bi bi-droplet-fill', 'bi bi-calendar2-check', 'Update Ready', 'bi bi-download', 'PDF', 'Download PDF', 'bi bi-arrow-down-circle-fill', 'file', null, null, false, 3],
            ['Admission Open Notice', 'Add latest admission notice for NEET, JEE, Foundation Course and Test Series batches.', 'notices', 'Notice', 'bi bi-megaphone-fill', 'bi bi-calendar2-check', 'Latest', 'bi bi-bell-fill', 'Notice', 'Apply Now', 'bi bi-arrow-right-circle-fill', 'route', 'frontend.admission', null, false, 4],
            ['Upcoming Test Series Schedule', 'Placeholder for chapter-wise test schedule, full syllabus mock tests and revision test dates.', 'notices exam', 'Test Notice', 'bi bi-clipboard2-check-fill', 'bi bi-calendar-event', 'Schedule', 'bi bi-clipboard-check', 'Test', 'View Test Series', 'bi bi-arrow-right-circle-fill', 'route', 'frontend.test-series', null, false, 5],
            ['NEET/JEE Exam Update Placeholder', 'Add official exam date updates, registration reminders, admit card updates and important notices.', 'exam tips', 'Exam Update', 'bi bi-calendar-event-fill', 'bi bi-clock-fill', 'Important', 'bi bi-info-circle-fill', 'Update', 'Read Update', 'bi bi-arrow-right-circle-fill', 'custom', null, '#', true, 6],
            ['Admission Inquiry Form', 'Downloadable admission inquiry form placeholder for offline student/parent inquiry.', 'downloads', 'Form', 'bi bi-file-earmark-text-fill', 'bi bi-file-pdf', 'PDF', 'bi bi-person-lines-fill', 'Admission', 'Download Form', 'bi bi-arrow-down-circle-fill', 'file', null, null, false, 7],
            ['How to Build Daily NEET/JEE Study Discipline', 'Tips for daily revision, practice questions, test review and weak-topic improvement.', 'tips study', 'Preparation Tip', 'bi bi-lightbulb-fill', 'bi bi-journal-check', 'Guide', 'bi bi-stars', 'Tips', 'Read Tips', 'bi bi-arrow-right-circle-fill', 'custom', null, '#', false, 8],
            ['Fee Concession Announcement', 'Details for education support and fee concession up to 50% for eligible students.', 'notices downloads', 'Announcement', 'bi bi-award-fill', 'bi bi-percent', 'Concession', 'bi bi-shield-check', 'Eligibility', 'Check Eligibility', 'bi bi-arrow-right-circle-fill', 'route', 'frontend.scholarship', null, false, 9],
        ];

        foreach ($items as $item) {
            DB::table('resource_items')->insert([
                'title' => $item[0],
                'description' => $item[1],
                'category_slugs' => $item[2],
                'badge_text' => $item[3],
                'icon' => $item[4],
                'meta_one_icon' => $item[5],
                'meta_one_text' => $item[6],
                'meta_two_icon' => $item[7],
                'meta_two_text' => $item[8],
                'button_text' => $item[9],
                'button_icon' => $item[10],
                'link_type' => $item[11],
                'route_name' => $item[12],
                'custom_url' => $item[13],
                'is_featured' => $item[14],
                'sort_order' => $item[15],
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $permissions = ['resource_item_create', 'resource_item_edit', 'resource_item_delete', 'resource_item_access'];

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
        Schema::dropIfExists('resource_items');

        $permissionIds = Permission::whereIn('title', [
            'resource_item_create',
            'resource_item_edit',
            'resource_item_delete',
            'resource_item_access',
        ])->pluck('id');

        foreach (Role::all() as $role) {
            $role->permissions()->detach($permissionIds);
        }

        Permission::whereIn('id', $permissionIds)->delete();
    }
};

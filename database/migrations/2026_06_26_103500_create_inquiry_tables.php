<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('course');
            $table->text('message')->nullable();
            $table->timestamps();
        });

        Schema::create('admission_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('parent_name')->nullable();
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->string('course_interested');
            $table->string('student_class')->nullable();
            $table->string('fee_concession')->nullable();
            $table->text('message')->nullable();
            $table->string('source')->default('admission_page');
            $table->timestamps();
        });

        Schema::create('scholarship_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('parent_name')->nullable();
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->string('course_interested');
            $table->string('current_class')->nullable();
            $table->string('eligibility_category');
            $table->string('last_percentage')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });

        $now = now();
        foreach ([
            'contact_inquiry_access',
            'contact_inquiry_delete',
            'admission_inquiry_access',
            'admission_inquiry_delete',
            'scholarship_inquiry_access',
            'scholarship_inquiry_delete',
        ] as $permissionTitle) {
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
            ->whereIn('title', [
                'contact_inquiry_access',
                'contact_inquiry_delete',
                'admission_inquiry_access',
                'admission_inquiry_delete',
                'scholarship_inquiry_access',
                'scholarship_inquiry_delete',
            ])
            ->pluck('id');

        DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('scholarship_inquiries');
        Schema::dropIfExists('admission_inquiries');
        Schema::dropIfExists('contact_inquiries');
    }
};

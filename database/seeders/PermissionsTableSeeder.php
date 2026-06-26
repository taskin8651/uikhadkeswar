<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 24,
                'title' => 'profile_password_edit',
            ],
            [
                'title' => 'about_why_item_create',
            ],
            [
                'title' => 'about_why_item_edit',
            ],
            [
                'title' => 'about_why_item_delete',
            ],
            [
                'title' => 'about_why_item_access',
            ],
            [
                'title' => 'company_recognition_create',
            ],
            [
                'title' => 'company_recognition_edit',
            ],
            [
                'title' => 'company_recognition_delete',
            ],
            [
                'title' => 'company_recognition_access',
            ],
            [
                'title' => 'result_ranker_create',
            ],
            [
                'title' => 'result_ranker_edit',
            ],
            [
                'title' => 'result_ranker_delete',
            ],
            [
                'title' => 'result_ranker_access',
            ],
            [
                'title' => 'result_testimonial_create',
            ],
            [
                'title' => 'result_testimonial_edit',
            ],
            [
                'title' => 'result_testimonial_delete',
            ],
            [
                'title' => 'result_testimonial_access',
            ],
            [
                'title' => 'gallery_item_create',
            ],
            [
                'title' => 'gallery_item_edit',
            ],
            [
                'title' => 'gallery_item_delete',
            ],
            [
                'title' => 'gallery_item_access',
            ],
            [
                'title' => 'faculty_member_create',
            ],
            [
                'title' => 'faculty_member_edit',
            ],
            [
                'title' => 'faculty_member_delete',
            ],
            [
                'title' => 'faculty_member_access',
            ],
            [
                'title' => 'startup_card_create',
            ],
            [
                'title' => 'startup_card_edit',
            ],
            [
                'title' => 'startup_card_delete',
            ],
            [
                'title' => 'startup_card_access',
            ],
        ];

        Permission::insert($permissions);
    }
}

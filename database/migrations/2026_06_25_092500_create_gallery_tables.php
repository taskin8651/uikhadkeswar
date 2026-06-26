<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('label')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('media_type')->default('image');
            $table->string('source_url', 500)->nullable();
            $table->string('thumbnail_url', 500)->nullable();
            $table->string('category_slugs')->nullable();
            $table->string('layout')->default('normal');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $now = now();

        DB::table('gallery_categories')->insert([
            ['name' => 'Photos', 'slug' => 'photos', 'icon' => 'bi bi-image-fill', 'sort_order' => 1, 'status' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Videos', 'slug' => 'videos', 'icon' => 'bi bi-play-btn-fill', 'sort_order' => 2, 'status' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Classroom', 'slug' => 'classroom', 'icon' => 'bi bi-easel-fill', 'sort_order' => 3, 'status' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Events', 'slug' => 'events', 'icon' => 'bi bi-calendar-event-fill', 'sort_order' => 4, 'status' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Seminars', 'slug' => 'seminars', 'icon' => 'bi bi-megaphone-fill', 'sort_order' => 5, 'status' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Student Activities', 'slug' => 'activities', 'icon' => 'bi bi-people-fill', 'sort_order' => 6, 'status' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);

        $items = [
            ['Classroom Learning Environment', 'Classroom', 'Classroom learning environment', 'image', 'assets/img/img2.jpeg', 'assets/img/img2.jpeg', 'photos classroom', 'tall'],
            ['Student Activity', 'Activities', 'Student activity', 'image', 'assets/img/img3.jpeg', 'assets/img/img3.jpeg', 'photos activities', 'normal'],
            ['Academy Event Video', 'Video', 'Academy event video', 'youtube', 'assets/img/img2.jpeg', 'assets/img/img2.jpeg', 'videos events', 'wide'],
            ['Career Guidance Seminar', 'Seminar', 'Career guidance seminar', 'image', 'assets/images/gallery/seminar-1.jpg', 'assets/img/img5.jpeg', 'photos seminars', 'normal'],
            ['Academic Event', 'Event', 'Academic event', 'image', 'assets/images/gallery/event-1.jpg', 'assets/img/img6.jpeg', 'photos events', 'tall'],
            ['Classroom Video', 'MP4 Video', 'Classroom video thumbnail', 'video', 'assets/videos/academy-video-1.mp4', 'assets/img/img4.jpeg', 'videos classroom', 'normal'],
            ['Focused Study Session', 'Classroom', 'Focused study session', 'image', 'assets/img/img8.jpeg', 'assets/img/img8.jpeg', 'photos classroom', 'normal'],
            ['Focused Study Session', 'Classroom', 'Focused study session', 'image', 'assets/img/img9.jpeg', 'assets/img/img9.jpeg', 'photos classroom', 'normal'],
            ['Focused Study Session', 'Classroom', 'Focused study session', 'image', 'assets/img/img10.jpeg', 'assets/img/img10.jpeg', 'photos classroom', 'normal'],
            ['Student Activities', 'Activities', 'Student activities', 'image', 'assets/img/img3.jpeg', 'assets/img/img3.jpeg', 'photos activities', 'wide'],
            ['Academic Seminar', 'Seminar', 'Academic seminar', 'image', 'assets/img/img4.jpeg', 'assets/img/img4.jpeg', 'photos seminars', 'normal'],
            ['Student Activity Video', 'Video', 'Student activity video thumbnail', 'youtube', 'assets/img/img2.jpeg', 'assets/img/img2.jpeg', 'videos activities', 'normal'],
        ];

        foreach ($items as $index => $item) {
            DB::table('gallery_items')->insert([
                'title' => $item[0],
                'label' => $item[1],
                'alt_text' => $item[2],
                'media_type' => $item[3],
                'source_url' => $item[4],
                'thumbnail_url' => $item[5],
                'category_slugs' => $item[6],
                'layout' => $item[7],
                'sort_order' => $index + 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        foreach (['gallery_item_create', 'gallery_item_edit', 'gallery_item_delete', 'gallery_item_access'] as $permissionTitle) {
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
            ->whereIn('title', ['gallery_item_create', 'gallery_item_edit', 'gallery_item_delete', 'gallery_item_access'])
            ->pluck('id');

        DB::table('permission_role')->whereIn('permission_id', $permissionIds)->delete();
        DB::table('permissions')->whereIn('id', $permissionIds)->delete();
        Schema::dropIfExists('gallery_items');
        Schema::dropIfExists('gallery_categories');
    }
};

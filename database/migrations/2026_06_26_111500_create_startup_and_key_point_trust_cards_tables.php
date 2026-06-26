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
        Schema::create('startup_trust_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('footer_icon')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('color_class')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('key_point_trust_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('footer_icon')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('color_class')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        $startupCards = [
            ['Expert Faculty', 'Experienced teachers and mentors specialized in NEET, JEE and Foundation preparation.', 'bi bi-person-video3', 'bi bi-person', '<strong>10+</strong> Years of Teaching Experience', 'trust-card-red', 1],
            ['Weekly Test Series', 'Regular mock tests with detailed analysis to track performance and improvement.', 'bi bi-clipboard2-check-fill', 'bi bi-graph-up-arrow', 'Performance Reports Every Week', 'trust-card-blue', 2],
            ['Scholarship Support', 'Merit-based scholarships for deserving students to make quality education affordable.', 'bi bi-mortarboard-fill', 'bi bi-award-fill', 'Merit-Based <b></b> Need-Based Support', 'trust-card-green', 3],
            ['AI Performance Tracking', 'AI-powered analytics and personalized insights to help students improve smarter.', 'bi bi-bar-chart-line-fill', 'bi bi-cpu-fill', 'Smart Analytics <b></b> Personalized Insights', 'trust-card-purple', 4],
        ];

        foreach ($startupCards as $card) {
            DB::table('startup_trust_cards')->insert([
                'title' => $card[0],
                'description' => $card[1],
                'icon' => $card[2],
                'footer_icon' => $card[3],
                'footer_text' => $card[4],
                'color_class' => $card[5],
                'sort_order' => $card[6],
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $keyPointCards = [
            ['Experienced Faculty', 'Highly qualified teachers with deep subject expertise and a passion for student success.', 'bi bi-person-video3', 'bi bi-person-check', '<strong>10+</strong> Years of Teaching Experience', 'kpt-card-red', 1],
            ['AI Performance Tracking', 'AI-powered analytics to monitor progress, identify strengths and improve performance.', 'bi bi-bar-chart-line-fill', 'bi bi-graph-up-arrow', 'Smart Reports <b></b> Personalized Insights', 'kpt-card-blue', 2],
            ['Weekly Test Series', 'Regular mock tests with detailed analysis to boost accuracy, speed and confidence.', 'bi bi-clipboard2-check-fill', 'bi bi-calendar2-check', 'Practice <b></b> Analyze <b></b> Improve', 'kpt-card-green', 3],
            ['Scholarship Support', 'Merit-based scholarships and affordable fees to support deserving rural students.', 'bi bi-mortarboard-fill', 'bi bi-award-fill', 'Merit-Based <b></b> Need-Based', 'kpt-card-purple', 4],
            ['Parent Testimonials', 'Real feedback from parents who trust our academy for their child’s bright future.', 'bi bi-chat-square-heart-fill', 'bi bi-people', 'Trusted by 1000+ Parents', 'kpt-card-orange', 5],
            ['Results & Achievements', 'Consistent results, toppers and success stories that reflect our academic commitment.', 'bi bi-trophy-fill', 'bi bi-star', 'Rankers <b></b> Improvements <b></b> Success Stories', 'kpt-card-cyan', 6],
            ['Registered & Trusted', 'GST registered and transparent operations for complete safety and long-term trust.', 'bi bi-shield-check', 'bi bi-patch-check-fill', 'GST Registered <b></b> Transparent <b></b> Reliable', 'kpt-card-violet', 7],
            ['Future-Ready Learning', 'Digital learning support, recorded lectures and AI tools for smarter preparation.', 'bi bi-play-btn', 'bi bi-phone', 'Digital <b></b> AI-Powered <b></b> 24x7 Support', 'kpt-card-coral', 8],
        ];

        foreach ($keyPointCards as $card) {
            DB::table('key_point_trust_cards')->insert([
                'title' => $card[0],
                'description' => $card[1],
                'icon' => $card[2],
                'footer_icon' => $card[3],
                'footer_text' => $card[4],
                'color_class' => $card[5],
                'sort_order' => $card[6],
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $permissions = [
            'startup_trust_card_create',
            'startup_trust_card_edit',
            'startup_trust_card_delete',
            'startup_trust_card_access',
            'key_point_trust_card_create',
            'key_point_trust_card_edit',
            'key_point_trust_card_delete',
            'key_point_trust_card_access',
        ];

        foreach ($permissions as $permissionTitle) {
            $permission = Permission::create(['title' => $permissionTitle]);
            $role = Role::find(1);
            if ($role) {
                $role->permissions()->syncWithoutDetaching($permission->id);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('key_point_trust_cards');
        Schema::dropIfExists('startup_trust_cards');

        $permissionIds = Permission::whereIn('title', [
            'startup_trust_card_create',
            'startup_trust_card_edit',
            'startup_trust_card_delete',
            'startup_trust_card_access',
            'key_point_trust_card_create',
            'key_point_trust_card_edit',
            'key_point_trust_card_delete',
            'key_point_trust_card_access',
        ])->pluck('id');

        foreach (Role::all() as $role) {
            $role->permissions()->detach($permissionIds);
        }

        Permission::whereIn('id', $permissionIds)->delete();
    }
};

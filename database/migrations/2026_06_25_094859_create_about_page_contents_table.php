<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_page_contents', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_title')->nullable();
            $table->string('hero_highlight_text')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_tag_one')->nullable();
            $table->string('hero_tag_two')->nullable();
            $table->string('hero_tag_three')->nullable();
            $table->string('hero_tag_four')->nullable();
            $table->string('hero_image_alt')->nullable();
            $table->string('hero_focus_label')->nullable();
            $table->string('hero_focus_title')->nullable();
            $table->text('hero_focus_description')->nullable();
            $table->string('hero_stat_one_value')->nullable();
            $table->string('hero_stat_one_label')->nullable();
            $table->string('hero_stat_two_value')->nullable();
            $table->string('hero_stat_two_label')->nullable();

            // Intro
            $table->string('intro_heading')->nullable();
            $table->text('intro_description')->nullable();
            $table->string('intro_card_title')->nullable();
            $table->longText('intro_card_description')->nullable();
            $table->text('intro_quote_text')->nullable();
            $table->string('intro_quote_author')->nullable();

            $table->string('intro_core_one_title')->nullable();
            $table->text('intro_core_one_description')->nullable();
            $table->string('intro_core_two_title')->nullable();
            $table->text('intro_core_two_description')->nullable();
            $table->string('intro_core_three_title')->nullable();
            $table->text('intro_core_three_description')->nullable();
            $table->string('intro_core_four_title')->nullable();
            $table->text('intro_core_four_description')->nullable();

            // Vision Mission
            $table->string('vm_heading')->nullable();
            $table->text('vm_description')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('future_title')->nullable();
            $table->text('future_description')->nullable();

            // Teaching Method
            $table->string('method_heading')->nullable();
            $table->text('method_description')->nullable();
            $table->string('method_note')->nullable();

            $table->string('method_one_title')->nullable();
            $table->text('method_one_description')->nullable();
            $table->string('method_two_title')->nullable();
            $table->text('method_two_description')->nullable();
            $table->string('method_three_title')->nullable();
            $table->text('method_three_description')->nullable();
            $table->string('method_four_title')->nullable();
            $table->text('method_four_description')->nullable();

            // Support
            $table->string('support_heading')->nullable();
            $table->text('support_description')->nullable();
            $table->string('support_highlight_title')->nullable();
            $table->text('support_highlight_description')->nullable();

            $table->string('support_one_title')->nullable();
            $table->text('support_one_description')->nullable();
            $table->string('support_two_title')->nullable();
            $table->text('support_two_description')->nullable();
            $table->string('support_three_title')->nullable();
            $table->text('support_three_description')->nullable();
            $table->string('support_four_title')->nullable();
            $table->text('support_four_description')->nullable();

            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_page_contents');
    }
};
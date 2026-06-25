<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('founder_sections', function (Blueprint $table) {
            $table->string('story_title')->nullable()->after('location_value');
            $table->longText('story_description')->nullable()->after('story_title');
            $table->text('quote_text')->nullable()->after('story_description');
            $table->string('quote_author')->nullable()->after('quote_text');
        });
    }

    public function down(): void
    {
        Schema::table('founder_sections', function (Blueprint $table) {
            $table->dropColumn([
                'story_title',
                'story_description',
                'quote_text',
                'quote_author',
            ]);
        });
    }
};
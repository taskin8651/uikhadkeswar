<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('founder_sections', function (Blueprint $table) {
    $table->id();

    $table->string('image_alt')->nullable();

    $table->string('founder_name')->default('Dr. Vitthal Nagare');
    $table->string('qualification')->nullable();
    $table->string('designation')->nullable();

    $table->string('hero_title')->default('A Rural Education Vision Led by');
    $table->string('hero_highlight_text')->default('Dr. Vitthal Nagare');
    $table->text('hero_description')->nullable();

    $table->string('education_value')->nullable();
    $table->string('designation_value')->nullable();
    $table->string('company_value')->nullable();
    $table->string('location_value')->nullable();

    $table->boolean('status')->default(true);
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('founder_sections');
    }
};
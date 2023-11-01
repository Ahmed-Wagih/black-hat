<?php

use App\Models\ChallengeCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en');
            $table->string('cover_image')->nullable();
            $table->string('link')->nullable();
            $table->integer('pointes')->default(0);
            $table->integer('player_number')->nullable();
            $table->integer('match_number')->nullable();
            $table->integer('number_top')->nullable();
            $table->foreignIdFor(ChallengeCategory::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};

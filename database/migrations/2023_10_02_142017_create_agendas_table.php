<?php

use App\Models\Category;
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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en');
            $table->string('cover_image')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('date')->format('Y-m-d');
            $table->time('time')->format('H:m:s');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};

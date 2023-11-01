<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->string('full_name');
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gamer_id')->nullable();
            $table->integer('lifes')->default(3);
            $table->integer('experience_points')->default(0);
            $table->integer('health_bar')->default(1000);
            $table->integer('mena_bar')->default(1000);
            $table->integer('level')->default(1);
            $table->enum('gender',['male','female']);
            $table->integer('age')->nullable();
            $table->enum('body_shape',['s','m','L','xL']);
            $table->string('position')->nullable();
            $table->string('company_name')->nullable();
            $table->string('active')->default('pending');
            $table->smallInteger('confirmation_code')->nullable();
            $table->timestamp('code_verified_at')->nullable();
            $table->string('admin_active')->default('active');
            $table->string('email_verification_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

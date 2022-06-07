<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 250);
            $table->string('password');
            $table->string('country')->nullable();
            $table->string('occupation')->nullable();
            $table->string('organization')->nullable();
            $table->string('otp')->nullable();
            $table->string('image')->nullable();
            $table->text('social_id')->nullable();
            $table->enum('signup_type', ['A', 'G','F','N'])->comment('A => Apple, G => Google, F => Facebook, N =>Normal')->nullable();
            $table->enum('status', ['0', '1'])->comment('0 => off, 1 => on')->default('0');
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
}

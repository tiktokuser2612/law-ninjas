<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('videos');
            $table->string('thumbnail');
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->enum('status', ['0', '1'])->comment('0 => off, 1 => on')->default('0');
            $table->enum('price_type', ['free', 'paid'])->comment('free => Free, paid => Price')->default('free');
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
        Schema::dropIfExists('videos');
    }
}

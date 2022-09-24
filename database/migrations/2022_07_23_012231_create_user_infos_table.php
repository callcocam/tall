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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUuid('user_id')->nullable()->index();
            $table->string('office', 255)->nullable();
            $table->string('profession', 255)->nullable();
            $table->string('vereador_old_id', 255)->nullable();
            $table->string('genre', 20)->nullable();
            $table->string('formations', 255)->nullable();
            $table->string('date_birth', 255)->nullable();
            $table->string('nationality', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};

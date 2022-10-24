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
        Schema::create('input_options', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('slug')->nullable(); 
            $table->string('type')->nullable(); 
            $table->text('description')->nullable();   
            $table->foreignUuid('input_id')->nullable()->constrained('inputs')->cascadeOnDelete();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->enum('status',['draft','published'])->nullable()->comment("Situação")->default('published');
            $table->timestamps();
            $table->softDeletes();
        });
        // Schema::table('inputs', function (Blueprint $table) {
        //     $table->string('type')->nullable(); 
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_options');
    }
};

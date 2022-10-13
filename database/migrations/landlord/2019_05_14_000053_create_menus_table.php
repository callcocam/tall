<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('menus')) {
            Schema::create('menus', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('name', 255);
                $table->string('slug', 255)->nullable();
                $table->text('description')->nullable();
                $table->integer('ordering')->nullable()->default('0');
                $table->integer('sibling')->nullable();
                $table->enum('status',['draft','published'])->nullable()->comment("Situação")->default('published');
                $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();        
                $table->timestamps();
                $table->softDeletes();               
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}

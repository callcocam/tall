<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sub_menus')) {
            Schema::create('sub_menus', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('assets', 255)->nullable();
                $table->string('name', 255);
                $table->string('slug', 255)->nullable();
                $table->text('link', 255)->nullable();
                $table->string('icone', 50)->nullable();
                $table->string('attributes', 50)->nullable();
                $table->text('description')->nullable();
                $table->integer('ordering')->nullable()->default('0');
                $table->integer('sibling')->nullable();
                $table->enum('status',['draft','published'])->nullable()->comment("Situação")->default('published'); 
                $table->foreignUuid('menu_id')->nullable()->constrained('menus')->cascadeOnDelete();          
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
        Schema::dropIfExists('sub_menus');
    }
}

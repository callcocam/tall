<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenuOrderings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sub_menu_orderings')) {
            Schema::create('sub_menu_orderings', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->integer('ordering')->nullable()->default('0');
                $table->foreignUuid('tenant_id')->nullable()->constrained('tenants')->cascadeOnDelete();          
                $table->foreignUuid('sub_menu_id')->nullable()->constrained('sub_menus')->cascadeOnDelete();   
                $table->foreignUuid('parent_sub_menu_id')->nullable()->constrained('sub_menus')->cascadeOnDelete();   
                $table->foreignUuid('menu_id')->constrained('menus')->onDelete('cascade');       
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
        Schema::dropIfExists('sub_menu_orderings');
    }
}

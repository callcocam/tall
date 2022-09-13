<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', "slug")) {
                $table->string('slug')->nullable();
            }
            if (!Schema::hasColumn('users', "deleted_at")) {
                $table->softDeletes();
            } 
            if (!Schema::hasColumn('users', "tenant_id")) {
                $table->foreignUuid('tenant_id')->nullable()->constrained('tenants')->cascadeOnDelete();
            }                
        });

        Schema::table('sub_menus', function (Blueprint $table) {
            if (!Schema::hasColumn('sub_menus', "sub_menu_id")) {               
                $table->foreignUuid('sub_menu_id')->nullable()->constrained('sub_menus')->cascadeOnDelete();         
            }                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}

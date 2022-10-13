<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('slug')->nullable(); 
            $table->string('domain')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('prefix')->default('admin')->nullable();
            $table->string('database')->default('tenant');
            $table->string('middleware')->default('tenant');
            $table->string('provider')->default('tenant');
            $table->text('description')->nullable();   
            $table->integer('parent')->nullable();   
            $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->enum('status',['draft','published'])->nullable()->comment("Situação")->default('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}

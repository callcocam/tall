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
        Schema::create('copy_tenants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('stepTenant')->nullable();
            $table->longtext('stepAccess')->nullable();
            $table->longtext('stepMenus')->nullable();
            $table->integer('stepFinished')->nullable();
            $table->integer('step')->default(1)->nullable();
            $table->enum('status',['draft','published'])->nullable()->comment("Situação")->default('published');
            $table->text('description')->nullable();
            $table->foreignUuid('tenant')->nullable()->constrained('tenants')->cascadeOnDelete();
            $table->foreignUuid('tenant_id')->nullable()->constrained('tenants')->cascadeOnDelete();
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
        Schema::dropIfExists('copy_tenants');
    }
};

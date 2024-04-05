<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nit')->unique();
            $table->string('name')->unique();
            $table->string('email');
            $table->string('description')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('cel')->nullable();
            $table->string('tel')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('email_new_job')->default(true);
            $table->boolean('show_data')->default(true);
            
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('company_category_id')->unsigned()->nullable();
            $table->foreign('company_category_id')->references('id')->on('company_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

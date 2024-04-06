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
            $table->string('nit')->unique()->comment('');
            $table->string('name')->unique()->comment('');
            $table->string('email')->comment('');
            $table->string('description')->nullable()->comment('');
            $table->string('website')->nullable()->comment('');
            $table->string('facebook')->nullable()->comment('');
            $table->string('twitter')->nullable()->comment('');
            $table->string('cel')->nullable()->comment('');
            $table->string('tel')->nullable()->comment('');
            $table->boolean('active')->default(false)->comment('');
            $table->boolean('email_new_job')->default(true)->comment('');
            $table->boolean('show_data')->default(true)->comment('');
            
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned()->comment('');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->bigInteger('company_category_id')->unsigned()->nullable()->comment('');
            $table->foreign('company_category_id')->references('id')->on('company_categories')->onDelete('cascade');;
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

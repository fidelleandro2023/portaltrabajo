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
        Schema::create('jobseekers', function (Blueprint $table) {
            //$table->id();
            $table->string('email')->unique()->comment('');
            $table->string('doc')->unique()->comment('');
            $table->string('doc_type')->default('cc')->comment('');
            $table->string('first_name')->comment('');
            $table->string('last_name')->comment('');
            $table->string('phone')->nullable()->comment('');
            $table->string('cel')->comment('');
            $table->enum('sex', ['M', 'F'])->comment(''); 

            $table->bigInteger('user_id')->unsigned()->primary()->comment('');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseekers');
    }
};

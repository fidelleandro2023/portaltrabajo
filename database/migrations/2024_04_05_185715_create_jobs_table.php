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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('skills')->nullable()->comment('');
            $table->text('description')->nullable()->comment('');
            $table->text('who_apply')->nullable()->comment('');
            $table->text('offer')->nullable()->comment('');
            $table->integer('salary')->nullable()->comment('');
            $table->integer('experience')->default(0)->comment('');
            $table->date('closing_date')->nullable()->comment('');
            $table->string('email')->nullable()->comment('');
            $table->boolean('google')->default(false)->comment('');
            $table->boolean('showdata')->default(false)->comment('');
            $table->boolean('email_new_application')->default(false)->comment('');
            $table->boolean('inactive')->default(false)->comment('');

            $table->timestamps();  

            $table->bigInteger('occupation_id')->unsigned()->nullable()->default(1)->comment('');
            $table->foreign('occupation_id')->references('id')->on('occupations')->onDelete('cascade');

            $table->bigInteger('company_id')->unsigned()->nullable()->comment('');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->bigInteger('contract_type_id')->unsigned()->default(1)->comment('');
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

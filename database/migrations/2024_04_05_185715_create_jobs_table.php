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
            $table->text('skills')->nullable();
            $table->text('description')->nullable();
            $table->text('who_apply')->nullable();
            $table->text('offer')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('experience')->default(0);
            $table->date('closing_date')->nullable();
            $table->string('email')->nullable();
            $table->boolean('google')->default(false);
            $table->boolean('showdata')->default(false);
            $table->boolean('email_new_application')->default(false);
            $table->boolean('inactive')->default(false);

            $table->timestamps(); 
            
            $table->integer('occupation_id')->unsigned()->default(1);
            $table->foreign('occupation_id')->references('id')->on('occupations');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('contract_type_id')->unsigned()->default(1);
            $table->foreign('contract_type_id')->references('id')->on('contract_types');
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

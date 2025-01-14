<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     *  DATABASE MIGRATIONS DOES NOT GENERATE FOREIGN KEY COLUMNS. Model relationships are defined through the model class. 
     *  See this thread outlining: https://stackoverflow.com/questions/73606229/laravel-database-relationship-in-migration-vs-in-class-confused-both-of-them
     *  
     *  You can declare relationships in the migration to ensure the columns and foreign keys are created. 
     */
    
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', '300');
            $table->string('description', '500');
            $table->text('body_text');
            $table->text('body_html');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('folder_id')->constrained();
            $table->smallInteger('version');
            $table->boolean('require_acknowledgements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

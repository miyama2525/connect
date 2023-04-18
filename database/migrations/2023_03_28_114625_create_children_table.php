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
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('child_name');
            $table->string('birthday');
            $table->bigInteger('grade_id')->unsigned()->foreignId('garde_id')->constrained('grade_categories');
            $table->bigInteger('user_id')->unsigned()->foreignId('user_id')->constrained('users');
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};

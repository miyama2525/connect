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
        Schema::create('absences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ab_date');
            $table->bigInteger('reason_id')->unsigned()->foreignId('reason_id')->constrained('reasons')->nullable();
            $table->string('other')->nullable();
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
        Schema::dropIfExists('absences');
    }
};

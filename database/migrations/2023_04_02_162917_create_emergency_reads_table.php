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
        Schema::create('emergency_reads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->foreignId('user_id')->constrained('users');
            $table->bigInteger('emergency_id')->unsigned()->foreignId('emergency_id')->constrained('emergencies');
            $table->boolean('read')->default(false)->comment('未読 or 既読');
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_reads');
    }
};

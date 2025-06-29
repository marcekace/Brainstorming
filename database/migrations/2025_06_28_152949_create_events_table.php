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
        Schema::create('events', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('title');//title of the event
            $table->string('description');//detailed description of the event
            $table->timestamp('date_time');//date and time of the event
            $table->string('location');//physical or virtual location of the event
            $table->integer('capacity')->nullable();//maximum attendees
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

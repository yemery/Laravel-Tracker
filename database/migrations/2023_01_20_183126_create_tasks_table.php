<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('priority',['high','medium','low']);
            $table->boolean('is_completed');
            $table->timestamp("created_at")->default(now())->dateFormat('Y-M-D HH');
            $table->dateTime('deadline');
            $table->unsignedInteger('coefficient')->between(1,5);
            
            $table->foreignId('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};

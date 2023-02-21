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
            $table->enum('is_completed',['in progress','completed','not started'])->default('not started');
            $table->dateTime("created_at");
            $table->date('deadline');
            // $table->unsignedInteger('coefficient')->between(1,5);
            
            $table->foreignId('project_id')->onDelete('cascade');
            // on cascade => delete all tasks related to that project if it has been deleted
            // $table->foreign('project_id')->references('id')->on('projects');
            
            // $table->timestamps();
            $table->dateTime('updated_at');
            // ->nullable();
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

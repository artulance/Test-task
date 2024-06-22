<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//php artisan make:migration create_tasks
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description',191);
            $table->integer('group_task_id');
            $table->foreign('group_task_id')->references('id')->on('group_task');
            $table->integer('user_id'); //registramos el usuario que ha creado la tarea
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('iteration');
            $table->integer('periodicity_id'); 
            $table->foreign('periodicity_id')->references('id')->on('periodicity');
            $table->integer('status');
            $table->foreign('status')->references('id')->on('status');
            $table->integer('start_date');
            $table->date('due_date');
            // $table->date('completed_date')->nullable(); //Guardamos cuando se ha finalizado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

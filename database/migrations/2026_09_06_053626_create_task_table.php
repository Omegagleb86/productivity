<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->onDelete('cascade');
            $table->foreignId('task_form_id')->constrained('task_form', 'id')->onDelete('cascade');

            $table->string('name');
            $table->date('date');
            $table->integer('rate')->unsigned();
            $table->integer('priority')->unsigned()->unique();

            $table->boolean('checked')->comment('Выполнена задача или нет')->default(false);
            $table->date('date_checked')->comment('Дата выполнения задачи')->nullable();
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

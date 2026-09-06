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
        Schema::create('task_form', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_form_id')->constrained('activity_form', 'id')->onDelete('cascade');
            $table->string('name');
            $table->integer('weight')->unsigned()->comment('Взвешенность для более точного подсчёта активности');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_form');
    }
};

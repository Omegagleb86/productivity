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
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');

            $table->integer('status')->unsigned()->default('0')->comment('0 - Надо сделать, 1 - В процессе, 2 - Сделанно');
            $table->integer('score_points')->unsigned();

            $table->boolean('importance')->default(false);
            $table->boolean('urgency')->default(false);

            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('tasks', 'id')->onDelete('cascade');

            $table->dateTime('completed_at')->nullable();
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

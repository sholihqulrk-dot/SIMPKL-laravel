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
        Schema::create('table_grades', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->unsignedBigInteger('pkl_placement_id');
            $table->foreign('pkl_placement_id')->references('id')->on('table_companies')->onDelete('cascade');

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('table_student')->onDelete('cascade');

            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('table_teachers')->onDelete('cascade');

            // Kolom utama
            $table->bigInteger('score');
            $table->text('feedback')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_grades');
    }
};

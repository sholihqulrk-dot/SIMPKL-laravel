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
        Schema::create('table_pkl_placements', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel siswa
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('table_student')
                ->onDelete('cascade');

            // Relasi ke tabel perusahaan
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                ->references('id')
                ->on('table_companies')
                ->onDelete('cascade');

            // Relasi ke tabel guru pembimbing
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')
                ->references('id')
                ->on('table_teachers')
                ->onDelete('set null');

            // Detail PKL
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_weeks')->nullable();
            $table->enum('status', ['pending', 'active', 'completed'])->default('pending');
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pkl_placements');
    }
};

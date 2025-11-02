<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_assignment_updates', function (Blueprint $table) {
            $table->id();

            // Relasi ke tugas utama
            $table->unsignedBigInteger('assignment_id');
            $table->foreign('assignment_id')
                ->references('id')
                ->on('table_assignments')
                ->onDelete('cascade');

            // Relasi ke tabel siswa
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('table_student')
                ->onDelete('cascade');

            $table->text('content')->nullable();
            $table->enum('status', ['submitted', 'reviewed', 'rejected'])->default('submitted');

            // Review oleh guru pembimbing
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->foreign('reviewed_by')
                ->references('id')
                ->on('table_teachers')
                ->onDelete('set null');

            $table->text('feedback')->nullable();
            $table->boolean('has_file')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('assignment_updates');
    }
};


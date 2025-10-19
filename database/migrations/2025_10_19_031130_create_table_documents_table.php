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
         Schema::create('table_documents', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel siswa
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('table_student')
                ->onDelete('cascade');

            // Relasi ke tabel penempatan PKL
            $table->unsignedBigInteger('pkl_placement_id')->nullable();
            $table->foreign('pkl_placement_id')
                ->references('id')
                ->on('table_pkl_placements')
                ->onDelete('cascade');

            // Informasi file
            $table->string('title');
            $table->string('filename');
            $table->string('file_path');

            // Kategori dan status
            $table->enum('category', ['journal', 'report', 'attendance', 'assignment_letter', 'supporting'])
                ->default('supporting');
            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');

            // Review oleh guru pembimbing
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->foreign('reviewed_by')
                ->references('id')
                ->on('table_teachers')
                ->onDelete('set null');

            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_documents');
    }
};

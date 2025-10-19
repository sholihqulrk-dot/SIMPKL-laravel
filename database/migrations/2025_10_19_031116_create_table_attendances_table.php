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
        Schema::create('table_attendances', function (Blueprint $table) {
            $table->id();

            // Foreign key ke tabel siswa
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('table_student')
                ->onDelete('cascade');

            // Foreign key ke tabel perusahaan tempat PKL
            $table->unsignedBigInteger('pkl_placement_id');
            $table->foreign('pkl_placement_id')
                ->references('id')
                ->on('table_companies')
                ->onDelete('cascade');

            // Tanggal kehadiran
            $table->date('attendance_date');

            // Status kehadiran
            $table->enum('status', ['present', 'absent', 'sick', 'permission']);

            // Catatan tambahan
            $table->text('notes')->nullable();

            // Status persetujuan
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');

            // Disetujui oleh pembimbing perusahaan
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')
                ->references('id')
                ->on('table_companies')
                ->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_attendances');
    }
};

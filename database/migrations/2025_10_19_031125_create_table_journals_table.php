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
        Schema::create('table_journals', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel siswa
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('table_student')
                ->onDelete('cascade');

            // Relasi ke tabel penempatan PKL
            $table->unsignedBigInteger('pkl_placement_id');
            $table->foreign('pkl_placement_id')
                ->references('id')
                ->on('table_pkl_placements')
                ->onDelete('cascade');

            // Data jurnal
            $table->string('title');
            $table->text('content');
            $table->integer('week_number');
            $table->date('journal_date');
            $table->enum('status', ['draft', 'submitted', 'approved', 'rejected'])->default('draft');

            // Reviewer (guru pembimbing)
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->foreign('reviewed_by')
                ->references('id')
                ->on('table_teachers')
                ->onDelete('set null');

            $table->timestamp('reviewed_at')->nullable();
            $table->integer('score')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_journals');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_assignments', function (Blueprint $table) {
            $table->id();
            // Foreign key ke tabel perusahaan tempat PKL
            $table->unsignedBigInteger('pkl_placement_id');
            $table->foreign('pkl_placement_id')
                ->references('id')
                ->on('table_companies')
                ->onDelete('cascade');

            $table->string('title');
            $table->text('description')->nullable();
            $table->date('deadline')->nullable();
            $table->bigInteger('grade')->nullable();
            $table->enum('created_by_type', ['teacher', 'supervisor']);
            $table->unsignedBigInteger('created_by_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_assignment_files', function (Blueprint $table) {
            $table->id();

            // Relasi ke table_assignment_updates
            $table->unsignedBigInteger('update_id');
            $table->foreign('update_id')
                ->references('id')
                ->on('table_assignment_updates')
                ->onDelete('cascade');

            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type')->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->boolean('reviewed')->default(false);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('assignment_files');
    }
};


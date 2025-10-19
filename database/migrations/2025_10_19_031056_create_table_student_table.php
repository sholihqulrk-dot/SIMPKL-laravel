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
        Schema::create('table_student', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke table_users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // jika user dihapus, student ikut terhapus

            // Data siswa
            $table->string('nis')->unique();
            $table->string('class');
            $table->string('major');
            $table->text('address');
            $table->string('phone');
            $table->string('email')->unique();

            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_student');
    }
};

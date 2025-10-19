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
        Schema::create('table_teachers', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke table_users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // jika user dihapus, data guru ikut terhapus

            // Data guru
            $table->string('name');
            $table->string('nip')->unique()->nullable();
            $table->string('phone');
            $table->text('address');
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
        Schema::dropIfExists('table_teachers');
    }
};

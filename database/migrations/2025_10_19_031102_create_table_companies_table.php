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
         Schema::create('table_companies', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke table_users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // jika user dihapus, company juga ikut terhapus

            // Data perusahaan
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique()->nullable();
            $table->string('website')->nullable();

            // Data pembimbing (supervisor)
            $table->string('supervisor_name');
            $table->string('supervisor_phone');
            $table->string('supervisor_email')->unique()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_companies');
    }
};

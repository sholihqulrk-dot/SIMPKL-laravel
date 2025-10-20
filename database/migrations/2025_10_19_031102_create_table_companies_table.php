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

            // Relasi ke tabel user (akun login pembimbing industri)
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            // Informasi umum perusahaan
            $table->string('name');                        // Nama perusahaan
            $table->string('business_field')->nullable();  // Bidang usaha
            $table->string('address');                     // Alamat
            $table->string('phone')->nullable();           // Nomor telepon
            $table->string('email')->nullable();           // Email
            $table->string('website')->nullable();         // Website
            $table->string('npwp')->nullable();            // NPWP
            $table->string('established_year')->nullable();  // Tahun berdiri

            // Deskripsi dan status
            $table->text('description')->nullable();       // Deskripsi perusahaan
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Statistik tambahan
            $table->integer('total_employees')->nullable();    // Total karyawan
            $table->integer('active_students')->nullable();    // Siswa PKL aktif
            $table->decimal('rating', 3, 1)->nullable();       // Rating PKL (misal 4.8)

            // Informasi pembimbing industri (supervisor)
            $table->string('supervisor_name')->nullable();
            $table->string('supervisor_position')->nullable(); // Jabatan pembimbing
            $table->string('supervisor_phone')->nullable();
            $table->string('supervisor_email')->nullable();

            // HR atau kontak tambahan
            $table->string('hr_name')->nullable();
            $table->string('hr_position')->nullable();
            $table->string('hr_phone')->nullable();
            $table->string('hr_email')->nullable();

            // Informasi PKL
            $table->string('work_schedule')->nullable();       // Jadwal kerja (misal "Senin–Jumat, 08:00–16:00")
            $table->string('pkl_duration')->nullable();        // Durasi PKL (misal "6 bulan (24 minggu)")
            $table->text('facilities')->nullable();            // Fasilitas (Laptop, Wifi, Makan)
            $table->text('training_program')->nullable();      // Program pelatihan (Web Dev, Database, dll)

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

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
        Schema::create('job_postings', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // Foreign key ke perusahaan di tabel users
                $table->string('job_title'); // Judul pekerjaan
                $table->text('job_description'); // Deskripsi pekerjaan
                $table->text('requirements'); // Persyaratan pekerjaan
                $table->string('salary')->nullable(); // Gaji
                $table->string('location')->nullable(); // Lokasi pekerjaan
                $table->enum('status', ['active', 'inactive'])->default('active'); // Status pekerjaan
                $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};

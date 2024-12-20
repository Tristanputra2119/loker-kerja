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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); // Relasi ke tabel companies
            $table->foreignId('job_category_id')->nullable()->constrained('job_categories')->onDelete('set null'); // Relasi ke kategori
            $table->string('title'); // Judul pekerjaan
            $table->text('description'); // Deskripsi pekerjaan
            $table->text('requirements')->nullable(); // Persyaratan pekerjaan
            $table->string('salary')->nullable(); // Gaji pekerjaan
            $table->string('location')->nullable(); // Lokasi pekerjaan
            $table->string('image')->nullable(); // Kolom untuk menyimpan gambar pekerjaan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

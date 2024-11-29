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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_posting_id')->constrained('job_postings')->cascadeOnDelete(); // Lowongan
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // Pelamar
            $table->enum('status', ['Pending', 'Accepted', 'Rejected'])->default('Pending'); // Status lamaran
            $table->text('cover_letter')->nullable(); // Surat lamaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

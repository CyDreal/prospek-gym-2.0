<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->constrained()->onDelete('cascade');
            $table->string('sessions'); // "1x session", "8x sessions"
            $table->string('duration'); // "1 Hari", "24 Hari", "1 Bulan"
            $table->string('price'); // "Rp50.000", "Rp40.000/sesi"
            $table->integer('sessions_count'); // untuk sorting dan logic
            $table->decimal('price_numeric', 10, 2); // untuk perhitungan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_packages');
    }
};

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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->default('Personal Trainer');
            $table->string('image'); // path gambar (misal: promotions/abc.jpg)
            $table->text('description');
            $table->enum('type', ['freelance', 'inhouse'])->default('freelance');
            $table->string('instagram_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('specializations_title')->nullable(); // untuk kasus khusus seperti "Kelas Cardio & Body Conditioning"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};

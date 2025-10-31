<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet', 150);
            $table->string('telephone', 50)->unique();
            $table->string('email', 150)->unique()->nullable();
            $table->string('mot_de_passe');
            $table->enum('role', ['client', 'vendeur', 'admin'])->default('client');
            $table->foreignId('pays_id')->nullable()->constrained('pays')->nullOnDelete();
            $table->string('ville', 150)->nullable();
            $table->string('commune', 150)->nullable();
            $table->string('shop')->nullable();
            $table->string('location')->nullable();
            $table->string('social')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lokasi');
            $table->foreign('id_lokasi')
                  ->references('id')
                  ->on('locations')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->string('no_tiket');
            $table->string('no_polisi', 15);
            $table->unsignedBigInteger('id_jenis');
            $table->foreign('id_jenis')
                  ->references('id')
                  ->on('vehicle_types')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->dateTime('masuk');
            $table->dateTime('keluar')->nullable();
            $table->integer('perjam_pertama')->nullable();
            $table->integer('perjam_berikutnya')->nullable();
            $table->integer('max_perhari')->nullable();
            $table->integer('total_jam')->nullable();
            $table->integer('total_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tamu');
            $table->date('checkin');
            $table->date('checkout');
            $table->string('nokamar');
            $table->string('email')->unique();
            $table->string('telp')->unique();
            $table->string('status');
            $table->text('alamat');
            $table->string('kebutuhan')->nullable(); //kebutuhan khusus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};

// untuk menghapus table gunakan: php artisan migrate:rollback --batch=(lihat di database migrations)

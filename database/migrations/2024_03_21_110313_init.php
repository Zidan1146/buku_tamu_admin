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
        // admin table (id, username, password)
        // note, for passwords it'll be added with a bcrypt hash
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');

            $table->timestamps();
        });

        // tamu table (id, nama, instansi, noTelepon)
        Schema::create('tbl_tamu', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('instansi');
            $table->string('noTelepon');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_admin');
        Schema::dropIfExists('tbl_tamu');
    }
};

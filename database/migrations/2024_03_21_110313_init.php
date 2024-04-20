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
        try {
            // admin table (id, username, ip, password)
            // note, for passwords it'll be added with a bcrypt hash
            Schema::create('tbl_admin', function (Blueprint $table) {
                $table->uuid();
                $table->string('ip');
                $table->string('username');
                $table->string('password');

                $table->timestamps();
            });

            Schema::create('tbl_client', function (Blueprint $table) {
                $table->uuid();
                $table->string('ip');
                $table->string('deviceName');

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

            Schema::create('tbl_log', function (Blueprint $table) {
                $table->id();

                $table->string('ip');
                $table->string('tag');
                $table->string('message');

                $table->timestamps();
            });
        } catch (\Throwable $th) {
            $this->cleanUp();

            throw $th;
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->cleanUp();
    }

    private function cleanUp(): void {
        Schema::dropIfExists('tbl_admin');
        Schema::dropIfExists('tbl_tamu');
        Schema::dropIfExists('tbl_client');
        Schema::dropIfExists('tbl_log');
    }
};

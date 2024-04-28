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
            Schema::table('tbl_tamu', function (Blueprint $table) {
                $table->dropColumn('noTelepon');
            });
        } catch (\Throwable $th) {
            Schema::table('tbl_admin', function (Blueprint $table) {
                $table->string('noTelepon');
            });

            throw $th;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_admin', function (Blueprint $table) {
            $table->string('noTelepon');
        });
    }
};

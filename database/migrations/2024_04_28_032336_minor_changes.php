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
            Schema::table('tbl_admin', function (Blueprint $table) {
                $table->enum('status', ['active', 'inactive'])->default('active')->after('password');
            });
        } catch (\Throwable $th) {
            Schema::table('tbl_admin', function (Blueprint $table) {
                $table->dropColumn('status');
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
            $table->dropColumn('status');
        });
    }
};

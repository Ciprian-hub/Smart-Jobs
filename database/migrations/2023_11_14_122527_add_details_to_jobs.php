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
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('salary');
            $table->string('level');
            $table->string('program');
            $table->longText('details');
            $table->longText('benefits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('salary');
            $table->dropColumn('level');
            $table->dropColumn('program');
            $table->dropColumn('details');
            $table->dropColumn('benefits');
        });
    }
};

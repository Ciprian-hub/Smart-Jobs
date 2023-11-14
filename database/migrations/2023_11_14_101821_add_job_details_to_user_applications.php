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
        Schema::table('user_applications', function (Blueprint $table) {
            $table->string('job_title');
            $table->string('company_name');
            $table->string('company_location');
            $table->string('company_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_applications', function (Blueprint $table) {
            $table->dropColumn('job_title');
            $table->dropColumn('company_name');
            $table->dropColumn('company_location');
            $table->dropColumn('company_title');
        });
    }
};

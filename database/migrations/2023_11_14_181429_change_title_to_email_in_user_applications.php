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
            $table->renameColumn('company_title', 'company_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_applications', function (Blueprint $table) {
            $table->renameColumn('company_email', 'company_title');
        });
    }
};

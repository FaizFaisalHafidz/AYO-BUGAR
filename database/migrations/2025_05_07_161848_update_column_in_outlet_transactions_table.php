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
        Schema::table('outlet_transactions', function (Blueprint $table) {
            $table->foreignId('card_member_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('outlet_transactions', function (Blueprint $table) {
            $table->foreignId('card_member_id')->nullable(false)->change();
        });
    }
};

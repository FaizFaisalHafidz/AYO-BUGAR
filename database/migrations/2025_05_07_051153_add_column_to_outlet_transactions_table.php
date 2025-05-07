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
            $table->foreignId('outlet_price_list_id')->constrained('outlet_price_lists')->cascadeOnDelete()->after('outlet_service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('outlet_transactions', function (Blueprint $table) {
            $table->dropForeign(['outlet_price_list_id']);
            $table->dropColumn('outlet_price_list_id');
        });
    }
};

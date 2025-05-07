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
        Schema::table('card_members', function (Blueprint $table) {
            $table->string('card_member_name')->nullable()->change();
            $table->date('dob')->nullable()->change();
            $table->string('nik')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('wa_number')->nullable()->change();
            $table->date('effective_date')->nullable()->change();
            $table->date('expired_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('card_members', function (Blueprint $table) {
            $table->string('card_member_name')->nullable(false)->change();
            $table->date('dob')->nullable(false)->change();
            $table->string('nik')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('wa_number')->nullable(false)->change();
            $table->date('effective_date')->nullable(false)->change();
            $table->date('expired_date')->nullable(false)->change();
        });
    }
};

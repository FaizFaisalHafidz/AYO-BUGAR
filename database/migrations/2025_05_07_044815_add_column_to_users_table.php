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
        Schema::table('users', function (Blueprint $table) {
            $table->string('code')->nullable()->after('id');
            $table->date('dob')->nullable()->after('password');
            $table->string('nik')->after('name')->nullable();
            $table->string('wa_number')->after('dob')->nullable();
            $table->date('join_date');
            $table->bigInteger('created_by')->nullable()->after('join_date');
            $table->softDeletes()->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

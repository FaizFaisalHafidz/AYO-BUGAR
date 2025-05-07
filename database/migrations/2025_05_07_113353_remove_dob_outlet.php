<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table_name = 'outlets';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable($this->table_name)) {
            Schema::table($this->table_name, function (Blueprint $table) {
                $table->dropColumn('dob');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable($this->table_name)) {
            if (!Schema::hasColumn('dob')) {
                Schema::table($this->table_name, function (Blueprint $table) {
                    $table->date('dob')->after('name');
                });
            }
        }
    }
};

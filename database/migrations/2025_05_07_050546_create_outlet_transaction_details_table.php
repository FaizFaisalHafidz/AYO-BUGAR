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
        Schema::create('outlet_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outlet_transaction_id')->constrained('outlet_transactions')->onDelete('cascade');
            $table->string('item');
            $table->bigInteger('total');
            $table->text('description');
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlet_transaction_details');
    }
};

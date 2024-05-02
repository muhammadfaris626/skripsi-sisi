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
        Schema::create('approval_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('claim_code');
            $table->foreignId('fpkn_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reason_claim_id')->constrained()->cascadeOnDelete();
            $table->longText('transaction_information');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_complaints');
    }
};

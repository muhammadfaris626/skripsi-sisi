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
        Schema::create('fpkns', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_code');
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->foreignId('request_type_id')->constrained()->cascadeOnDelete();
            $table->string('form_date');
            $table->foreignId('transaction_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('transaction_feature_id')->constrained()->cascadeOnDelete();
            $table->string('transaction_value');
            $table->longText('description');
            $table->longText('escalation');
            $table->integer('card_center_status')->default(0);
            $table->integer('settlement_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fpkns');
    }
};

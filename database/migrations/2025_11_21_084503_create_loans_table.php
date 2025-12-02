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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->decimal('principal', 10, 2);
            $table->decimal('total_interest', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('frequency', ['daily', 'weekly', 'monthly', 'yearly']);
            $table->enum('status', ['active', 'closed', 'defaulted']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

<?php

use App\Enums\LoanFrequency;
use App\Enums\LoanStatus;
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
            $table->string('reference_no');
            $table->foreignId('customer_id')->constrained('customers');
            $table->decimal('principal', 10, 2);
            $table->decimal('total_interest', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->decimal('rate', 10, 2)->max(100);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('frequency', array_column(LoanFrequency::cases(), 'value'))->default(LoanFrequency::DAILY->value);
            $table->enum('status', array_column(LoanStatus::cases(), 'value'))->default(LoanStatus::ACTIVE->value);
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

<?php

use App\Enums\PaymentStatus;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->nullable()->constrained('loans')->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained('loans')->nullOnDelete();
            $table->string('reference_order_id');
            $table->string('reference_payment_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->dateTime('paid_at');
            $table->enum('status', array_column(PaymentStatus::cases(), 'value'))->default(PaymentStatus::ATTEMPTED->value);
            $table->json('allocation');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

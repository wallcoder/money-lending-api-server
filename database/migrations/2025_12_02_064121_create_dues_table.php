<?php

use App\Enums\DueStatus;
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
        Schema::create('dues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans')->cascadeOnDelete();
            $table->date('due_date');
            $table->decimal('amount', 10, 2);
            $table->decimal('penalty_amount', 10, 2);
            $table->decimal('amount_paid', 10, 2);
            $table->decimal('penalty_paid', 10, 2);
            $table->enum('status', array_column(DueStatus::cases(), 'values'))->default(DueStatus::UNPAID->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dues');
    }
};

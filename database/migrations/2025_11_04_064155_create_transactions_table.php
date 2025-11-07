<?php

use App\Enums\PaymentGateway;
use App\Enums\PaymentMethod;
use App\Enums\TransactionStatus;
use App\Enums\TransactionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained('orders')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            
            // Transaction identifiers
            $table->string('transaction_number')->unique(); // TXN20251104XXXX
            $table->string('gateway_transaction_id')->nullable()->index(); // Payment gateway's ID
            
            // Payment details
            $table->enum('payment_method', array_column(PaymentMethod::cases(), 'value'))->default(PaymentMethod::COD);
            $table->enum('type', array_column(TransactionType::cases(), 'value'))->default(TransactionType::PAYMENT);
            $table->enum('status', array_column(TransactionStatus::cases(), 'value'))->default(TransactionStatus::PENDING);
            
            // Financial details
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('INR');
            $table->decimal('gateway_fee', 10, 2)->default(0);
            
            // Payment gateway details
            $table->enum('gateway', array_column(PaymentGateway::cases(), 'value'))->nullable()->default(PaymentGateway::RAZORPAY);
            
            // Additional info
            $table->text('notes')->nullable();
            $table->text('failure_reason')->nullable();
            
            // Timestamps
            $table->timestamp('attempted_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('order_id');
            $table->index('user_id');
            $table->index('status');
            $table->index('type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
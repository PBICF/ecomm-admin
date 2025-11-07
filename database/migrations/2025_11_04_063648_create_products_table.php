<?php

use App\Enums\ProductStatus;
use App\Enums\ProductType;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', array_column(ProductType::cases(), 'value'))->default(ProductType::PHYSICAL);

            // Pricing
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('cost_price', 10, 2)->nullable(); // internal tracking

            // Inventory
            $table->integer('stock')->default(0);
            $table->boolean('in_stock')->default(true);
            $table->string('sku')->unique()->nullable();

            // Description & content
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // Product status
            $table->enum('status', array_column(ProductStatus::cases(), 'value'))->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

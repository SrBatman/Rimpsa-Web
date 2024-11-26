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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id'); // UNSIGNED por defecto con bigIncrements
            $table->unsignedInteger('user_id'); // UNSIGNED y NOT NULL
            $table->string('tracking_no');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('pincode');
            $table->mediumText('address');
            $table->string('status_message'); // Renombrado para coincidir con el script
            $table->string('payment_mode');
            $table->string('payment_id')->nullable();
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP')); // Compatibilidad con el script
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Compatibilidad con el script
        });

        
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id'); // UNSIGNED por defecto con bigIncrements
            $table->unsignedBigInteger('order_id'); // UNSIGNED y NOT NULL
            $table->unsignedInteger('product_id'); // UNSIGNED y NOT NULL
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP')); // Compatibilidad con el script
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // Compatibilidad con el script
        });

        // Schema::create('shopping_carts', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        //     $table->timestamps();
        // });

        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        // Schema::dropIfExists('shopping_carts');
        Schema::dropIfExists('cart_items');
    }
};

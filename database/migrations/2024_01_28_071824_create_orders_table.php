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
            $table->id();
            $table->enum("status",["pending","processing","shipped","on hold"])->default("pending");
            $table->enum("type",["order","cart"])->default("cart");
            $table->decimal("total_price")->default(0);
            $table->foreignId("user_id")->constrained('users')->onDelete("cascade");
            $table->integer("discount")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

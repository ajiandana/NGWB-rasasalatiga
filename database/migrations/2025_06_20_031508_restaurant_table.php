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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('logo');
            $table->string('image');
            $table->string('address');
            $table->string('contact', 15);
            $table->string('bio', 400);
            $table->string('link_location', 255);
            $table->enum('category', [
                'Restoran',
                'Kafe & Kedai Kopi',
                'Jajanan & Warung Kaki Lima',
                'Toko Roti & Kue',
                'Minuman & Es',
                'Makanan Beku & Siap Saji',
                'Oleh-oleh & Produk Khas Daerah'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
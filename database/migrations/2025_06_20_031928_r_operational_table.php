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
        Schema::create('r_operational', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resto_id')->constrained('restaurants')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('days', [
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            ]);
            $table->time('open_time')->nullable(false);
            $table->time('close_time')->nullable(false);
            $table->boolean('is_closed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

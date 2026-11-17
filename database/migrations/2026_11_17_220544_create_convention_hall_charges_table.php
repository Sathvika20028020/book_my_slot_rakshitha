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
        Schema::create('convention_hall_charges', function (Blueprint $table) {
            $table->id();
              $table->foreignId('convention_hall_id')
            ->unique()
            ->constrained('convention_halls')
            ->cascadeOnDelete();

        $table->decimal('booking_fee', 12, 2)->default(0);
        $table->decimal('security_deposit', 12, 2)->default(0);
        $table->decimal('additional_charges', 12, 2)->default(0);
        $table->decimal('gst_percentage', 5, 2)->default(0);

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convention_hall_charges');
    }
};

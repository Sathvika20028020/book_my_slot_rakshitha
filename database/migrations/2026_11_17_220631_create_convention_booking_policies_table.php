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
        Schema::create('convention_booking_policies', function (Blueprint $table) {
            $table->id();
              $table->foreignId('convention_center_login_id')
            ->unique()
            ->constrained('convention_center_logins')
            ->cascadeOnDelete();

        $table->unsignedInteger('min_advance_days');
        $table->string('max_booking_duration');
        $table->longText('cancellation_rules');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convention_booking_policies');
    }
};

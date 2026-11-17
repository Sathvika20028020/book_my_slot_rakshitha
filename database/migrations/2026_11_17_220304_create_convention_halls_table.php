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
        Schema::create('convention_halls', function (Blueprint $table) {
            $table->id();
              $table->id();

        $table->foreignId('convention_center_login_id')
            ->constrained('convention_center_logins')
            ->cascadeOnDelete();

        $table->string('venue_id')->nullable();
        $table->string('hall_name');
        $table->unsignedInteger('sort_order')->default(0);
             $table->foreignId('hall_id')
            ->nullable()
            ->after('convention_center_login_id')
            ->constrained('convention_halls')
            ->nullOnDelete();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convention_halls');
    }
};

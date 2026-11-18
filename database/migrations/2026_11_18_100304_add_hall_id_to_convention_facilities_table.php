
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('convention_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('hall_id')
                ->nullable()
                ->after('convention_center_login_id');

            $table->foreign('hall_id')
                ->references('id')
                ->on('convention_halls')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('convention_facilities', function (Blueprint $table) {
            $table->dropForeign(['hall_id']);
            $table->dropColumn('hall_id');
        });
    }
};

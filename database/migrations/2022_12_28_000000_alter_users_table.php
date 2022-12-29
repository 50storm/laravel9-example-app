<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->float('amount_float', 8, 2);
            $table->double('amount_double', 8, 2);
            $table->decimal('amount_deciamal', $precision = 8, $scale = 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presenteds', function (Blueprint $table) {
            $table->dropColumn('amount_float');
            $table->dropColumn('amount_double');
            $table->dropColumn('amount_deciamal');

        });
    }
};

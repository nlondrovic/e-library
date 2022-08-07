<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->foreignId('checkout_end_reason_id')->nullable()->constrained('checkout_end_reasons');
        });
    }

    public function down()
    {
        Schema::table('checkouts', function($table) {
            $table->dropColumn('checkout_end_reason_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservation_end_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('value');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_end_reasons');
    }
};

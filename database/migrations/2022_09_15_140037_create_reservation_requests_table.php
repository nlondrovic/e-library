<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservation_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('book_id')->constrained('books');
            $table->dateTime('start_time');
            $table->string('status')->default('pending');
            $table->foreignId('librarian_id')->nullable()->constrained('users');
            $table->dateTime('end_time')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_requests');
    }
};

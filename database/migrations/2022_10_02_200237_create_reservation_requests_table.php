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
            $table->timestamps();
            $table->foreignId('student_id')->nullable()->constrained('users');
            $table->foreignId('librarian_id')->nullable()->constrained('users');
            $table->foreignId('book_id')->nullable()->constrained('books');
            $table->string('status')->default('Pending');
            $table->dateTime('start_time');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_requests');
    }
};

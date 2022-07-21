<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('author_id')->constrained('authors')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('books', function($table) {
            $table->dropColumn('author_id');
        });
    }
};

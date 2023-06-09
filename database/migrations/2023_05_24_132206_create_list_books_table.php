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
        Schema::create('list_books', function (Blueprint $table) {
            $table->id();
            $table->string('categoryBook');

            $table->string('name');
            $table->string('slug');
            $table->string('writer');
            $table->string('publisher');
            $table->longText('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_books');
    }
};

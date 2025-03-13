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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user1_id');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamp('created_at')->useCurrent();

            // Foreign key constraints
            $table->foreign('book_id')
                  ->references('id')
                  ->on('books')
                  ->onDelete('cascade');

            $table->foreign('user1_id')
                  ->references('id')
                  ->on('user1s')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

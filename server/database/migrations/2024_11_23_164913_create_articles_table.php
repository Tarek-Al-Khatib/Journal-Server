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
        Schema::create('articles', function (Blueprint $table) {
            $table->unsignedBigInteger("journal_reference");
            $table->unsignedBigInteger("posted_by");
            $table->string("text");

            $table->primary(["journal_reference", "posted_by"]);

            $table->foreign('journal_reference')->references('id')->on('journals')->onDelete('cascade');
            $table->foreign('posted_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

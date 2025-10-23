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
        Schema::create('populations', function (Blueprint $table) {
            $table->unsignedBigInteger('townid');
            $table->year('ryear');
            $table->integer('women');
            $table->integer('total');
            $table->timestamps();

            $table->primary(['townid', 'ryear']);
            $table->foreign('townid')->references('id')->on('towns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populations');
    }
};

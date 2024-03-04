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
    Schema::create('mountains', function (Blueprint $table) {
      $table->bigIncrements('id')->startingValue(10000);
      $table->string('name');
      $table->string('nameKana');
      $table->unsignedBigInteger('prefecture_id');
      $table->string('address')->nullable();
      $table->double('latitude', 17, 14);
      $table->double('longitude', 17, 14);
      $table->timestamps();
      $table
        ->foreign('prefecture_id')
        ->references('id')
        ->on('prefectures');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('mountains');
  }
};

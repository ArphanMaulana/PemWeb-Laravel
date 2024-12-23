<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('cast_movies', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->foreignUuid('movie_id')->constrained('movies')->cascadeOnUpdate()->cascadeOnDelete();
        $table->foreignUuid('cast_id')->constrained('casts')->cascadeOnUpdate()->cascadeOnDelete();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('cast_movies');
    }
  };

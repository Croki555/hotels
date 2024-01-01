<?php

use App\Models\Hotel;
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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('poster_url', 100)->nullable();
            $table->unsignedDecimal('floor_area', 8,2);
            $table->string('type', 100);
            $table->integer('price');
            $table->foreignIdFor(Hotel::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

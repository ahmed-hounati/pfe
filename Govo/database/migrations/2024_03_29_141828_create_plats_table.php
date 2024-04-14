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
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->foreignId('resto_id')->constrained('users');
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories');
            $table->boolean('valid')->default(0);
            $table->timestamps();
        });
    }

};

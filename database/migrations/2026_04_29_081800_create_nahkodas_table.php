<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNahkodasTable extends Migration
{
    public function up()
    {
        Schema::create('nahkodas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('pengalaman');
            $table->string('sertifikasi')->nullable();
            $table->float('rating')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nahkodas');
    }
}
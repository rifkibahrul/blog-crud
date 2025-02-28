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
        Schema::create('post', function (Blueprint $table) {
            $table->id('idpost')->autoIncrement();
            $table->text('title')->notNullable();
            $table->text('content')->notNullable();
            $table->datetime('date')->notNullable();
            $table->string('username', 45)->notNullable();

            $table->foreign('username')->references('username')->on('account')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price_monthly')->default(0);
            $table->string('stripe_price_monthly_id')->nullable();
            $table->decimal('price_yearly')->default(0);
            $table->string('stripe_price_yearly_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeItemsTable extends Migration
{
    public function up()
    {
        Schema::create('trade_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->foreignId('trade_id')->constrained('trades');
            $table->foreignId('variant_id')->constrained('variants');
            $table->double('amount');
            $table->double('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trade_items');
    }
}

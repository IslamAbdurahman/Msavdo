<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrivalItemsTable extends Migration
{
    public function up()
    {
        Schema::create('arrival_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arrival_id')->constrained('arrivals');
            $table->foreignId('product_id')->constrained('products');
            $table->double('amount');
            $table->double('price');
            $table->double('sel_price');
            $table->string('barcode')->nullable();
            $table->text('info_json')->nullable();
            $table->string('info')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arrival_items');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKirimItemsTable extends Migration
{
    public function up()
    {
        Schema::create('kirim_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kirim_id')->constrained('kirims');
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
        Schema::dropIfExists('kirim_items');
    }
}

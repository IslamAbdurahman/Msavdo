<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraphicsTable extends Migration
{
    public function up()
    {
        Schema::create('graphics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->double('amount');
            $table->double('paid_amount')->default(0);
            $table->double('discount')->default(0);
            $table->date('month');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('graphics');
    }
}

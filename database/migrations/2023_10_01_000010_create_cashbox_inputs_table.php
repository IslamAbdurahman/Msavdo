<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashboxInputsTable extends Migration
{
    public function up()
    {
        Schema::create('cashbox_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cashbox_id')->constrained('cashboxes');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('client_id')->nullable()->constrained('users');
            $table->foreignId('graphic_id')->nullable()->constrained('graphics');
            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->double('amount');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cashbox_inputs');
    }
}

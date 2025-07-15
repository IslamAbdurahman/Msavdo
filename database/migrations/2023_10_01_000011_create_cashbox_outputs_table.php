<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashboxOutputsTable extends Migration
{
    public function up()
    {
        Schema::create('cashbox_outputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cashbox_id')->constrained('cashboxes');
            $table->bigInteger('user_id');
            $table->bigInteger('client_id');
            $table->double('amount');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cashbox_outputs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantTable extends Migration
{
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kirim_item_id')->constrained('kirim_items');
            $table->double('amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('variant');
    }
}

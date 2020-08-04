<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('address')->nullable(false);
            $table->integer('phone')->nullable(false);
            $table->text('comment')->default('');

            $table->string('currency')->nullable(false)->default('euro');

            $table->integer('user_id')->nullable(true);

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
        Schema::dropIfExists('orders');
    }
}

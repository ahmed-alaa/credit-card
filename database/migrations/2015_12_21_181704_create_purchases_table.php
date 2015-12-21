<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // The purchases done
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('price');
            $table->string('name_on_card');
            $table->string('card_type');
            $table->string('card_number');
            $table->string('expiry_date');
            $table->string('address');
            $table->string('alt_address');
            $table->string('city');
            $table->string('post_code');
            $table->string('state');
            $table->string('country');
            $table->rememberToken();
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
        Schema::drop('purchases');
    }
}

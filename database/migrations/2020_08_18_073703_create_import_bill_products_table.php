<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_bill_products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('product_id');
            $table->integer('import_bill_id');
            $table->float('weight');
            $table->integer('import_price');
            $table->date('outdate');
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
        Schema::dropIfExists('import_bill_products');
    }
}

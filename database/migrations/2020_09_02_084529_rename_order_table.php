<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameOrderTable extends Migration
{
    public function up()
    {
        Schema::rename('orders_', 'orders');
    }

    public function down()
    {
        Schema::rename('orders', 'orders_');
    }
}

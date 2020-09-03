<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUnitToImportBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import_bill_products', function (Blueprint $table) {
            $table->text('unit');
        });
    }

    public function down()
    {
        Schema::table('import_bill_products', function (Blueprint $table) {
            $table->dropColumn('unit');
        });
    }
}

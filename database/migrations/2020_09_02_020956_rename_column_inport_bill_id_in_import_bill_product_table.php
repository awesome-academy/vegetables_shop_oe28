<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInportBillIdInImportBillProductTable extends Migration
{
    public function up()
    {
        Schema::table('import_bill_products', function (Blueprint $table) {
            $table->renameColumn('inport_bill_id', 'import_bill_id');
        });
    }

    public function down()
    {
        Schema::table('import_bill_products', function (Blueprint $table) {
            $table->renameColumn('import_bill_id', 'inport_bill_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_data', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->date('bill_date');
            $table->string('vendor_name');
            $table->string('batch_number');
            $table->string('mfg_date');
            $table->string('exp_date');
            $table->string('vendor_invoice_no');
            $table->date('vendor_invoice_date');
            $table->string('quantity_in_kgltr');
            $table->string('document_type');
            $table->string('site_id');
            $table->string('identity');
            $table->string('client');
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
        Schema::dropIfExists('purchase_data');
    }
}

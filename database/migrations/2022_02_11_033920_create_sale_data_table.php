<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_data', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->date('bill_date');
            $table->string('bill_no');
            $table->string('sales_to_customer_name');
            $table->string('quantity_in_kgltr');
            $table->string('batch_no');
            $table->string('mfg_date');
            $table->string('exp_date');
            $table->string('site_id');
            $table->string('document_type');
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
        Schema::dropIfExists('sale_data');
    }
}

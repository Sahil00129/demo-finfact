<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_transfer', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->date('bill_date');
            $table->string('bill_no');
            $table->string('quantity_in_kgltr');
            $table->string('batch_no');
            $table->string('mfg_date')->nullable();
            $table->string('exp_date')->nullable();
            $table->string('trf_frm_site_id');
            $table->string('trf_to_site_id');
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
        Schema::dropIfExists('stock_transfer');
    }
}

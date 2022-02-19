<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_master', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->nullable();
            $table->string('item_number')->nullable();
            $table->string('pack')->nullable();
            $table->string('group')->nullable();
            $table->string('poi')->nullable();
            $table->string('regis_no')->nullable();
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
        Schema::dropIfExists('item_master');
    }
}

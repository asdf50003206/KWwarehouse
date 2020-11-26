<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWareHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table ->date('purchase_date');//進貨日期
            $table->string('inventory_location',100);//庫位
            $table->string('tracking_number',100);//訂單號碼
            $table->string('moved_number',100);//挪單單號
            $table->string('inventory_name',100);//品名
            $table->string('batch_number',100);//批號
            $table->string('sw_number',100);//車台
            $table->float('purchase_quantity',9,3);//進貨數量
            $table->date('shipping_date');//出貨日期
            $table->string('dv_number',100);//缸號
            $table->float('shipping_quantity',9,3);//出貨數量
            $table->float('shipping_weight',9,3);//出貨重量
            $table->float('inventory_quantity',9,3);//庫存數量
            $table->float('inventory_weight',9,3);//庫存重量
            $table->string('remark',100);//備註
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
        Schema::dropIfExists('ware_houses');
    }
}

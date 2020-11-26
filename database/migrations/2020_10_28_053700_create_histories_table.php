<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action',100);//動作
            
            $table->date('purchase_date_old');//進貨日期_舊
            $table->date('purchase_date_new');//進貨日期_新

            $table->string('inventory_location_old',100);//庫位_舊
            $table->string('inventory_location_new',100);//庫位_新

            $table->string('tracking_number_old',100);//訂單號碼_舊
            $table->string('tracking_number_new',100);//訂單號碼_新

            $table->string('moved_number_old',100);//挪單單號_舊
            $table->string('moved_number_new',100);//挪單單號_新

            $table->string('inventory_name_old',100);//品名_舊
            $table->string('inventory_name_new',100);//品名_新

            $table->string('weaving_factory_old',100);//織廠_舊
            $table->string('weaving_factory_new',100);//織廠_新

            $table->string('batch_number_old',100);//批號_舊
            $table->string('batch_number_new',100);//批號_新

            $table->string('sw_number_old',100);//車台_舊
            $table->string('sw_number_new',100);//車台_新

            $table->string('color_old',100);//預染顏色_舊
            $table->string('color_new',100);//預染顏色_新

            $table->float('purchase_quantity_old',9,3);//進貨數量_舊
            $table->float('purchase_quantity_new',9,3);//進貨數量_新

            $table->float('purchase_weight_old',9,3);//進貨公斤數_舊
            $table->float('purchase_weight_new',9,3);//進貨公斤數_新

            $table->date('shipping_date_old');//出貨日期_舊
            $table->date('shipping_date_new');//出貨日期_新

            $table->string('dv_number_old',100);//缸號_舊
            $table->string('dv_number_new',100);//缸號_新

            $table->float('shipping_quantity_old',9,3);//出貨數量_舊
            $table->float('shipping_quantity_new',9,3);//出貨數量_新

            $table->float('shipping_weight_old',9,3);//出貨重量_舊
            $table->float('shipping_weight_new',9,3);//出貨重量_新

            $table->float('inventory_quantity_old',9,3);//庫存數量_舊
            $table->float('inventory_quantity_new',9,3);//庫存數量_新

            $table->float('inventory_weight_old',9,3);//庫存重量_舊
            $table->float('inventory_weight_new',9,3);//庫存重量_新

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
        Schema::dropIfExists('histories');
    }
}

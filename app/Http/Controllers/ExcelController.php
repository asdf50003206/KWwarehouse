<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Session;
use DB;
use App\Warehouse;
use App\Exports\WarehouseExport;

class ExcelController extends Controller
{
    
    public function export(){

        if(Session::has('request_filter')){
            $request_filter = Session::get('request_filter');
            $warehouse = DB::select($request_filter);
        }
        else{
            $warehouse = Warehouse::orderBy('id','asc')->get();
        }
        $array =array();
        foreach($warehouse as $warehouse){
            array_push($array,[
                $warehouse->id,
                $warehouse->purchase_date,
                $warehouse->tracking_number,
                $warehouse->inventory_location,
                $warehouse->moved_number,
                $warehouse->inventory_name,
                $warehouse->batch_number,
                $warehouse->weaving_factory,
                $warehouse->sw_number,
                $warehouse->purchase_quantity,
                $warehouse->purchase_weight,
                $warehouse->shipping_date,
                $warehouse->dv_number,
                $warehouse->color,
                $warehouse->shipping_quantity,
                $warehouse->shipping_weight,
                $warehouse->inventory_quantity,
                $warehouse->inventory_weight,
                $warehouse->remark
            ]);

        }
        
        
        $cellData = new WarehouseExport([
            ['序號','進貨日期','訂單號碼','庫位','挪單單號','品名','批號','織廠','車台','進貨疋數','進貨公斤數','出貨日期','缸號','預染顏色','出貨疋數','出貨公斤數','庫存疋數','庫存公斤數','備註'],
                $array
            
        ]);
        return Excel::download($cellData, '倉庫'.\Carbon\Carbon::now().'.xlsx');
    }
}

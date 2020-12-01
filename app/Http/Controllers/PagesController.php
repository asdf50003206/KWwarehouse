<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use App\History;
use DB;
use Session;

class PagesController extends Controller
{
    public function index(){
        return view('welcome');
    }
    //庫存頁面
    public function showinventory($filter){

        Session::forget('request_filter');
            $warehouse = Warehouse::orderBy('id','asc')->get();
            return view('pages.inventory')->with('warehouse',$warehouse)->with('filter',$filter);
        
            
    }
    //顯示篩選結果
    public function showfilter(Request $request){
        $request_filter = 'SELECT * FROM warehouses WHERE ';
        
        
        for($i =1;$i<=$request->input('filter_number');$i++){
            $this ->validate($request,[
                'request_field'.$i =>'required'
                ]);
                if(is_int($request->input('request_field'.$i))){
                    $request_filter = $request_filter.$request->input('field'.$i).' '.$request->input('condition'.$i).' '.$request->input('request_field'.$i).' ';
                }
                elseif($request->input('condition'.$i) == 'LIKE'){
                    $request_filter = $request_filter.$request->input('field'.$i).' '.$request->input('condition'.$i).' \'%'.$request->input('request_field'.$i).'%\'';
                }
                else{
                    $request_filter = $request_filter.$request->input('field'.$i).' '.$request->input('condition'.$i).' \''.$request->input('request_field'.$i).'\' ';
                }
            
            if($i != $request->input('filter_number')){
                $request_filter = $request_filter.'AND ';
            }
        }
        $array = array();
        for ($i =1;$i <=$request->input('filter_number');$i++){
            array_push($array,$request->input('field'.$i));
            array_push($array,$request->input('condition'.$i));
            array_push($array,$request->input('request_field'.$i));
        }
        Session::put('request_filter',$request_filter);
        $warehouse = DB::select($request_filter);
        return view('pages.filter')->with('warehouse',$warehouse)->with('filter',$request->input('filter_number'))->with('request_filter',$array);
    }
    //歷史紀錄清單
    public function showhistorylist(){
        $history = History::orderBy('id','desc')->get();
        return view('pages.history')->with('history',$history);
        
    }
    //歷史紀錄詳情
    public function showhistorydetail($id){
        $history_keys = array(
        'id'=>'序號',
        'action'=>'動作',
        'purchase_date_old'=>'進貨日期',
        'purchase_date_new' => '進貨日期',
        'inventory_location_old'=>'庫位',
        'inventory_location_new' => '庫位',
        'tracking_number_old'=>'訂單單號',
        'tracking_number_new' => '訂單單號',
        'moved_number_old'=>'挪單單號',
        'moved_number_new'=> '挪單單號',
        'inventory_name_old'=>'品名',
        'inventory_name_new'=> '品名',
        'weaving_factory_old'=>'織廠',
        'weaving_factory_new'=>'織廠',
        'batch_number_old'=>'批號',
        'batch_number_new'=> '批號',
        'sw_number_old'=>'車台',
        'sw_number_new'=>'車台',
        'color_old'=>'顏色',
        'color_new'=>'顏色',
        'purchase_quantity_old'=>'進貨疋數',
        'purchase_quantity_new'=> '進貨疋數',
        'purchase_weight_old'=>'進貨公斤數',
        'purchase_weight_new'=>'進貨公斤數',
        'shipping_date_old'=>'出貨日期',
        'shipping_date_new'=>'出貨日期',
        'dv_number_old'=>'缸號',
        'dv_number_new'=>'缸號',
        'shipping_quantity_old'=>'出貨疋數',
        'shipping_quantity_new'=> '出貨疋數',
        'shipping_weight_old'=>'出貨公斤數',
        'shipping_weight_new'=>'出貨公斤數',
        'inventory_quantity_old'=>'存貨疋數',
        'inventory_quantity_new'=> '存貨疋數',
        'inventory_weight_old'=>'存貨公斤數',
        'inventory_weight_new'=>'存貨公斤數',
        'remark_old'=>'備註',
        'remark_new'=>'備註',
        'created_at'=>'新增時間',
        'updated_at'=>'修改時間'
        );

        
        $history = History::where('id',$id)->get();
        return view('pages.historydetail')->with('history',$history)->with('history_keys',$history_keys);
        
    }
    public function shipment(){
        
        return view('pages.shipment');
    }

    public function shipping(Request $request){

        if(isset($_POST['search'])){
            $this ->validate($request,['tracking_number' => 'required']);
            $inventory = Warehouse::where('tracking_number',$request->input('tracking_number'))->first();
            return view('pages.shipment')->with('inventory',$inventory);
        }

        if(isset($_POST['submit'])){
        $this ->validate($request,[
            'tracking_number' => 'required',
            'inventory_quantity'=>'required',
            'inventory_weight'=>'required',
            'shipping_date'=>'required',
            'shipping_quantity'=>'required',
            'shipping_weight'=>'required'
            ]);

        $warehouse = Warehouse::where('tracking_number',$request->input('tracking_number'))->first();
        if((int)$warehouse->inventory_quantity<(int)($request->input('shipping_quantity'))||(int)$warehouse->inventory_weight<(int)($request->input('shipping_weight'))){
            return redirect('/shipment')->with('error','無法出貨，存貨不足');

        }
        else{
        $history = new History;
        $history->action = '出貨'; 
        $history->inventory_quantity_old = $warehouse->inventory_quantity;
        $history->inventory_quantity_new = (int)($warehouse->inventory_quantity)-(int)($request->input('shipping_quantity'));
        $history->inventory_weight_old = $warehouse->inventory_weight;
        $history->inventory_weight_new = (int)($warehouse->inventory_weight)-(int)($request->input('shipping_weight'));
        $history->save();

        $warehouse->inventory_quantity = (int)($warehouse->inventory_quantity)-(int)($request->input('shipping_quantity'));
        $warehouse->inventory_weight = (int)($warehouse->inventory_weight)-(int)($request->input('shipping_weight'));
        $warehouse->shipping_date = $request->input('shipping_date');
        $warehouse->shipping_quantity = $request->input('shipping_quantity');
        $warehouse->shipping_weight = $request->input('shipping_weight');
        $warehouse->save();

        return redirect('/inventory/1')->with('success','出貨成功');
        }

    }

    }
}

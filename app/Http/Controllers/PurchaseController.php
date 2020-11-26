<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use App\History;
use Session;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.purchase');
        // if(Session::has('loop_number')){
        //     $loop_number = Session::get('loop_number');
        //     return view('pages.purchase')->with('loop_number',$loop_number);
        // }
        // else{
        //     Session::put('loop_number',1);
        //     return view('pages.purchase')->with('loop_number',1);
        // }
        // return view('pages.purchase')->with('loop_number',Session::get('loop_number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this ->validate($request,[
        //     'purchase_date' => 'required',
        //     'inventory_location'=>'required',
        //     'tracking_number'=>'required',
        //     'inventory_name'=>'required',
        //     'batch_number'=>'required',
        //     'purchase_quantity'=>'required',
        //     'purchase_weight'=>'required',
        //     'weaving_factory'=>'required',
        //     'sw_number'=>'required'
        // ]);
        // $warehouse = new Warehouse;
        // $warehouse->purchase_date = $request->input('purchase_date');
        // $warehouse->inventory_location = $request->input('inventory_location');
        // $warehouse->tracking_number= $request->input('tracking_number');
        // $warehouse->inventory_name= $request->input('inventory_name');
        // $warehouse->batch_number= $request->input('batch_number');
        // $warehouse->purchase_quantity= $request->input('purchase_quantity');
        // $warehouse->purchase_weight=$request->input('purchase_weight');
        // $warehouse->weaving_factory=$request->input('weaving_factory');
        // $warehouse->sw_number=$request->input('sw_number');
        // $warehouse->color=$request->input('color');
        // $warehouse->remark=$request->input('remark');
        // $warehouse->save();
        //     if(isset($_POST['incress_loop_number'])){
            
        //     $loop_number = Session::get('loop_number');
        //     $loop_number = $loop_number +1;
        //     // Session::forget('loop_number');
        //     Session::put('loop_number',$loop_number);
        //     return view('pages.purchase')->with('loop_number',$loop_number);
        //    }
        //    if(isset($_POST['decress_loop_number'])){
        //     $loop_number = Session::get('loop_number');
        //     $loop_number =$loop_number -1;
        //     // Session::forget('loop_number');
        //     Session::put('loop_number',$loop_number);
        //     return view('pages.purchase')->with('loop_number',$loop_number);
        //    }
           if(isset($_POST['submit'])){
                
               
                $this ->validate($request,[
                    'purchase_date' => 'required',
                    'inventory_location'=>'required',
                    'tracking_number'=>'required',
                    'inventory_name'=>'required',
                    'purchase_quantity'=>'required',
                    'purchase_weight'=>'required',
                    ]);
                    //新增資料進庫存
                    $warehouse = new Warehouse;
                    $warehouse->purchase_date = $request->input('purchase_date');
                    $warehouse->inventory_location = $request->input('inventory_location');
                    $warehouse->tracking_number = $request->input('tracking_number');
                    $warehouse->moved_number = $request->input('moved_number');
                    $warehouse->inventory_name = $request->input('inventory_name');
                    $warehouse->batch_number = $request->input('batch_number');
                    $warehouse->weaving_factory =$request->input('weaving_factory');
                    $warehouse->sw_number=$request->input('sw_number');
                    $warehouse->purchase_quantity= $request->input('purchase_quantity');
                    $warehouse->purchase_weight=$request->input('purchase_weight');
                    $warehouse->dv_number=$request->input('dv_number');

                    $warehouse->inventory_quantity=$request->input('purchase_quantity');
                    $warehouse->inventory_weight=$request->input('purchase_weight');

                    $warehouse->color=$request->input('color');
                    $warehouse->remark=$request->input('remark');
                    $warehouse->save();
                    //新增資料進歷史紀錄
                    $history = new History;
                    $history->action = '入倉';
                    $history->tracking_number_new = $request->input('tracking_number');
                    $history->purchase_date_new = $request->input('purchase_date');
                    $history->inventory_location_new = $request->input('inventory_location');
                    $history->moved_number_new = $request->input('moved_number');
                    $history->inventory_name_new = $request->input('inventory_name');
                    $history->batch_number_new = $request->input('batch_number');
                    $history->weaving_factory_new =$request->input('weaving_factory');
                    $history->sw_number_new=$request->input('sw_number');
                    $history->purchase_quantity_new= $request->input('purchase_quantity');
                    $history->purchase_weight_new=$request->input('purchase_weight');

                    $history->inventory_quantity_new=$request->input('purchase_quantity');
                    $history->inventory_weight_new=$request->input('purchase_weight');

                    $history->dv_number_new=$request->input('dv_number');
                    $history->color_new=$request->input('color');
                    $history->remark_new=$request->input('remark');
                    $history->save();


               
               return redirect('/inventory/1') ;
            
           }

        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $warehouse = Warehouse::where('id',$id)->get();

            return view('pages.inventoryedit')->with('warehouse',$warehouse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $warehouse = Warehouse::find($id);
        $history = new History;
        // 新增進歷史紀錄
        $history->action='修改';
        //舊資料
        $history->purchase_date_old=$warehouse->purchase_date;
        $history->inventory_location_old=$warehouse->inventory_location;
        $history->tracking_number_old=$warehouse->tracking_number;
        $history->moved_number_old=$warehouse->moved_number;
        $history->inventory_name_old=$warehouse->inventory_name;
        $history->batch_number_old=$warehouse->batch_number;
        $history->weaving_factory_old=$warehouse->weaving_factory;
        $history->sw_number_old=$warehouse->sw_number;
        $history->purchase_quantity_old=$warehouse->purchase_quantity;
        $history->purchase_weight_old=$warehouse->purchase_weight;
        $history->shipping_date_old=$warehouse->shipping_date;
        $history->dv_number_old=$warehouse->dv_number;
        $history->shipping_quantity_old=$warehouse->shipping_quantity;
        $history->shipping_weight_old=$warehouse->shipping_weight;
        $history->inventory_quantity_old=$warehouse->inventory_quantity;
        $history->inventory_weight_old=$warehouse->inventory_weight;
        $history->color_old=$warehouse->color;
        $history->remark_old=$warehouse->remark;
        //新資料
        $history->purchase_date_new = $request->input('purchase_date');
        $history->inventory_location_new = $request->input('inventory_location');
        $history->tracking_number_new = $request->input('tracking_number');
        $history->moved_number_new = $request->input('moved_number');
        $history->inventory_name_new = $request->input('inventory_name');
        $history->batch_number_new = $request->input('batch_number');
        $history->weaving_factory_new =$request->input('weaving_factory');
        $history->sw_number_new=$request->input('sw_number');
        $history->purchase_quantity_new= $request->input('purchase_quantity');
        $history->purchase_weight_new=$request->input('purchase_weight');
        $history->shipping_date_new=$request->input('shipping_date');
        $history->dv_number_new=$request->input('dv_number');
        $history->shipping_quantity_new=$request->input('shipping_quantity');
        $history->shipping_weight_new=$request->input('shipping_weight');
        $history->inventory_quantity_new=$request->input('inventory_quantity');
        $history->inventory_weight_new=$request->input('inventory_weight');
        $history->color_new=$request->input('color');
        $history->remark_new=$request->input('remark');
        $history->save();

        //修改資料
        $warehouse->purchase_date = $request->input('purchase_date');
        $warehouse->inventory_location = $request->input('inventory_location');
        $warehouse->tracking_number = $request->input('tracking_number');
        $warehouse->moved_number = $request->input('moved_number');
        $warehouse->inventory_name = $request->input('inventory_name');
        $warehouse->batch_number = $request->input('batch_number');
        $warehouse->weaving_factory =$request->input('weaving_factory');
        $warehouse->sw_number=$request->input('sw_number');
        $warehouse->purchase_quantity= $request->input('purchase_quantity');
        $warehouse->purchase_weight=$request->input('purchase_weight');
        $warehouse->shipping_date = $request->input('shipping_date');
        $warehouse->dv_number=$request->input('dv_number');
        $warehouse->color=$request->input('color');
        $warehouse->shipping_quantity = $request->input('shipping_quantity');
        $warehouse->shipping_weight = $request->input('shipping_weight');
        $warehouse->inventory_quantity = $request->input('inventory_quantity');
        $warehouse->inventory_weight = $request->input('inventory_weight');
        $warehouse->remark=$request->input('remark');
        $warehouse->save();
        return redirect('/inventory/1');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function incress_loop_number(Request $request){
        
    }
    public function decress_loop_number(Request $request){
        
    }
}

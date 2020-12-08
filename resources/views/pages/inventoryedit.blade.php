@extends('layouts.app')
@section('content')

<!--上層按鈕-->

{{-- <div class="container-sm" style="margin-bottom:20px">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8"></div>
        <div class="col-2"><button  type="button" class="btn btn-success output_excel">輸出excel</button></div>

    </div>
</div> --}}


<!--主要內容-->
@include('inc.message')
<div class="container-fluid h-100" >
    <div class="row h-100">
        @include('layouts.menu')
        <div class="col-10">
            <div class="text-center" style="font-size:32px">修改</div>
            <div class="row justify-content-center">
            <div class="col-6 align-self-center main_table">
                @foreach ($warehouse as $warehouse)
                {!! Form::open(['action'=>['PurchaseController@update', $warehouse->id],'method'=>'POST']) !!}
                        {{ csrf_field() }}
                <table class="table table_striped" style="overflow:auto;white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td>入庫日期</td>
                            <td>{{Form::date('purchase_date',$warehouse->purchase_date)}}</td>
                        </tr>
                        <tr>
                            <td>庫位</td>
                            <td>{{Form::text('inventory_location',$warehouse->inventory_location)}}</td>
                        </tr>
                        <tr>
                            <td>訂單號碼</td>
                            <td>{{Form::text('tracking_number',$warehouse->tracking_number)}}</td>
                        </tr>
                        <tr>
                            <td>挪單單號</td>
                            <td>{{Form::text('moved_number',$warehouse->moved_number)}}</td>
                        </tr>
                        <tr>
                            <td>品名</td>
                            <td>{{Form::text('inventory_name',$warehouse->inventory_name)}}</td>
                        </tr>
                        <tr>
                            <td>批號</td>
                            <td>{{Form::text('batch_number',$warehouse->batch_number)}}</td>
                        </tr>
                        <tr>
                            <td>織廠</td>
                            <td>{{Form::text('weaving_factory',$warehouse->weaving_factory)}}</td>
                        </tr>
                        <tr>
                            <td>車台</td>
                            <td>{{Form::text('sw_number',$warehouse->sw_number)}}</td>
                        </tr>
                        <tr>
                            <td>進貨疋數</td>
                            <td>{{Form::text('purchase_quantity',$warehouse->purchase_quantity)}}</td>
                        </tr>
                        <tr>
                            <td>進貨公斤數</td>
                            <td>{{Form::text('purchase_weight',$warehouse->purchase_weight)}}</td>
                        </tr>
                        <tr>
                            <td>出貨日期</td>
                            <td>{{Form::date('shipping_date',$warehouse->shipping_date)}}</td>
                        </tr>
                        <tr>
                            <td>缸號</td>
                            <td>{{Form::text('dv_number',$warehouse->dv_number)}}</td>
                        </tr>
                        <tr>
                            <td>預染顏色</td>
                            <td>{{Form::text('color',$warehouse->color)}}</td>
                        </tr>
                        <tr>
                            <td>出貨疋數</td>
                            <td>{{Form::text('shipping_quantity',$warehouse->shipping_quantity)}}</td>
                        </tr>
                        <tr>
                            <td>出貨公斤數</td>
                            <td>{{Form::text('shipping_weight',$warehouse->shipping_weight)}}</td>
                        </tr>
                        <tr>
                            <td>庫存疋數</td>
                            <td>{{Form::text('inventory_quantity',$warehouse->inventory_quantity)}}</td>
                        </tr>
                        <tr>
                            <td>庫存公斤數</td>
                            <td>{{Form::text('inventory_weight',$warehouse->inventory_weight)}}</td>
                        </tr>
                        <tr>
                            <td>備註</td>
                            <td>{{Form::text('remark',$warehouse->remark)}}</td>
                        </tr>
                        
                        @endforeach
                        
                        
                    </tbody>
                </table>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('修改',['class'=>'btn btn-primary','name'=>'submit'])}}
                {{-- <input type="submit" name="incress_loop_number" value="+">
                <input type="submit" name="decress_loop_number" value="-"> --}}
                {!! Form::close() !!}
                
                {{-- <button class="btn btn-success" onclick="incress_loop_number()">+</button>
                <button class="btn btn-danger" onclick="decress_loop_number()">-</button> --}}
                
    
    
                {{-- {!!Form::open(['action' => 'PurchaseController@store' , 'method' =>'POST']) !!}
                <div class="form-group">
                    {{Form::label('purchase_date','入庫日期')}}
                    {{Form::text('purchase_date','',['class' => 'form-control','placeholder' => '入庫日期(年年年年/月月／日日)'])}}
                </div> 
                <div class="form-group">
                    {{Form::label('inventory_location','庫位')}}
                    {{Form::text('inventory_location','',['class' => 'form-control','placeholder' => '庫位'])}}
                </div>    
                <div class="form-group">
                    {{Form::label('tracking_number','訂單號碼')}}
                    {{Form::text('tracking_number','',['class' => 'form-control','placeholder' => '訂單號碼'])}}
                </div>    
                <div class="form-group">
                    {{Form::label('inventory_name','品名')}}
                    {{Form::text('inventory_name','',['class' => 'form-control','placeholder' => '品名'])}}
                </div>  
                <div class="form-group">
                    {{Form::label('batch_number','批號')}}
                    {{Form::text('batch_number','',['class' => 'form-control','placeholder' => '批號'])}}
                </div>  
                <div class="form-group">
                    {{Form::label('purchase_quantity','進貨疋數')}}
                    {{Form::text('purchase_quantity','',['class' => 'form-control','placeholder' => '進貨疋數'])}}
                </div> 
                <div class="form-group">
                    {{Form::label('purchase_weight','進貨公斤數')}}
                    {{Form::text('purchase_weight','',['class' => 'form-control','placeholder' => '進貨公斤數'])}}
                </div> 
                <div class="form-group">
                    {{Form::label('weaving_factory','織廠')}}
                    {{Form::text('weaving_factory','',['class' => 'form-control','placeholder' => '織廠'])}}
                </div> 
                <div class="form-group">
                    {{Form::label('sw_number','車台')}}
                    {{Form::text('sw_number','',['class' => 'form-control','placeholder' => '車台'])}}
                </div> 
                <div class="form-group">
                    {{Form::label('color','預染顏色')}}
                    {{Form::text('color','',['class' => 'form-control','placeholder' => '預染顏色'])}}
                </div> 
                <div class="form-group">
                    {{Form::label('remark','備註')}}
                    {{Form::text('remark','',['class' => 'form-control','placeholder' => '備註'])}}
                </div> 
                <div class="form-group">
                    {{Form::submit('提交',['class' => 'btn btn-success'])}} --}}
                {{-- </div>        --}}
            </div>
        </div>
        </div>
        
    </div>
</div>        

@endsection

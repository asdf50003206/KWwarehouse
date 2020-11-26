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
<div class="container-fluid" >
    <div class="row">
        @include('layouts.menu')
        <div class="col-10 filter">
            <div class="text-center" style="font-size:32px">進貨單</div>
            <div class="row justify-content-center">
            <div class="col-6 align-self-center main_table">
                {!! Form::open(['action'=>'PurchaseController@store','method'=>'POST']) !!}
                        {{ csrf_field() }}
                <table class="table table_striped" style="overflow:auto;white-space: nowrap;">
                    <tbody>
                        <tr>
                            <th>入庫日期*</th>
                            <td>{{Form::date('purchase_date', \Carbon\Carbon::now())}}</td>
                        </tr>
                            <tr>
                            <th>庫位*</th>
                            <td>{{Form::text('inventory_location','')}}</td>
                        </tr>
                        <tr>
                            <th>訂單號碼*</th>
                            <td>{{Form::text('tracking_number','')}}</td>
                        </tr>
                        <tr>
                            <th>挪單單號</th>
                            <td>{{Form::text('moved_number','')}}</td>
                        </tr>
                        <tr>
                            <th>品名*</th>
                            <td>{{Form::text('inventory_name','')}}</td>
                        </tr>
                        <tr>
                            <th>批號</th>
                            <td>{{Form::text('batch_number','')}}</td>
                        </tr>
                        <tr>
                            <th>織廠</th>
                            <td>{{Form::text('weaving_factory','')}}</td>
                        </tr>
                        <tr>
                            <th>車台</th>
                            <td>{{Form::text('sw_number','')}}</td>
                        </tr>
                        <tr>
                            <th>進貨疋數*</th>
                            <td>{{Form::text('purchase_quantity','')}}</td>
                        </tr>
                        <tr>
                            <th>進貨公斤數*</th>
                            <td>{{Form::text('purchase_weight','')}}</td>
                        </tr>
                        <tr>
                            <th>缸號</th>
                            <td>{{Form::text('dv_number','')}}</td>
                        </tr>
                        <tr>
                            <th>預染顏色</th>
                            <td>{{Form::text('color','')}}</td>
                        </tr>
                        <tr>
                            <th>備註</th>
                            <td>{{Form::text('remark','')}}</td>
                        </tr>
                    
                    
    
                        
                        {{-- @for ($i = 1; $i <=$loop_number; $i++) --}}

                        {{-- @endfor --}}
                        
                        
                    </tbody>
                </table>
                {{-- {{Form::text('loop_number',$loop_number,['style'=>'display:none;'])}}
                {{Form::submit('+',['class'=>'btn btn-success','name'=>'incress_loop_number'])}}
                {{Form::submit('-',['class'=>'btn btn-danger','name'=>'decress_loop_number'])}} --}}
                {{Form::submit('送出',['class'=>'btn btn-primary','name'=>'submit'])}}
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
        <div class="col-2"></div>
    </div>
</div>        
<div class="container-sm">
    <div class="row">
        
        
        
        
        
        
    </div>
@endsection

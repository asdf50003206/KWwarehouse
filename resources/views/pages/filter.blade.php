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
            篩選
            {!! Form::open(['action' => 'PagesController@showfilter','method'=>'GET']) !!}
            @for ($i = 1; $i <=$filter; $i++)
            <br>{{Form::label('field'.$i,'欄位:')}}
                {{Form::select('field'.$i,[
                    'id'=>'序號',
                    'purchase_date'=>'進貨日期',
                    'inventory_location'=>'庫位',
                    'tracking_number'=>'訂單單號',
                    'moved_number'=>'挪單單號',
                    'weaving_factory'=>'織廠',
                    'inventory_name'=>'品名',
                    'batch_number'=>'批號',
                    'color'=>'預染顏色',
                    'sw_number'=>'車台',
                    'purchase_quantity'=>'進貨疋量',
                    'purchase_weight'=>'進貨公斤數',
                    'shipping_date'=>'出貨日期',
                    'dv_number'=>'染缸',
                    'shipping_quantity'=>'出貨疋數',
                    'shipping_weight'=>'出貨公斤數',
                    'inventory_quantity'=>'庫存疋數',
                    'inventory_weight'=>'庫存公斤數',
                    'remark'=>'備註'
        ],$request_filter[($i-1)*3])}}
        {{Form::label('condition'.$i,'條件:')}}
        {{Form::select('condition'.$i,[
            '>'=>'大於',
            '<'=>'小於',
            "="=>'等於',
            'LIKE'=>'包含'
        ],$request_filter[($i-1)*3+1])}}
        {{Form::text('request_field'.$i,$request_filter[($i-1)*3+2])}}
        @endfor
        @if ($filter > 0)
        <a class="btn btn-danger" href="/inventory/{{$filter-1}}">-</a>
        @endif
        <br>
        {{Form::text("filter_number",$filter,['style' => 'display:none;'])}}
        <?php if($filter > 0){
        echo Form::submit('篩選');
        }
        ?>
        
        
        <a class="btn btn-primary" href="/inventory/{{$filter+1}}">增加條件</a>
            {!! Form::close() !!}
            
        
            <div class="main_table">
                <table>
                    <tr><td>序號</td><td>進貨日期</td><td>庫位</td><td>訂單號碼</td><td>挪單單號</td><td>品名</td><td>批號</td><td>織廠</td><td>車台</td><td>進貨疋數</td><td>進貨公斤</td><td>出貨日期</td><td>缸號</td><td>預染顏色</td><td>出貨疋數</td><td>出貨公斤</td><td>庫存疋數</td><td>庫存公斤</td><td>備註</td></tr>
                    
                    @if (count($warehouse)>0)
                    
                        @foreach ($warehouse as $warehouse)
                        <tr>
                    <td>{{$warehouse->id}}</td>
                    <td>{{$warehouse->purchase_date}}</td>
                    <td>{{$warehouse->inventory_location}}</td>
                    <td>{{$warehouse->tracking_number}}</td>
                    <td>{{$warehouse->moved_number}}</td>
                    <td>{{$warehouse->inventory_name}}</td>
                    <td>{{$warehouse->batch_number}}</td>
                    <td>{{$warehouse->weaving_factory}}</td>
                    <td>{{$warehouse->sw_number}}</td>
                    <td>{{$warehouse->purchase_quantity}}</td>
                    <td>{{$warehouse->purchase_weight}}</td>
                    <td>{{$warehouse->shipping_date}}</td>
                    <td>{{$warehouse->dv_number}}</td>
                    <td>{{$warehouse->color}}</td>
                    <td>{{$warehouse->shipping_quantity}}</td>
                    <td>{{$warehouse->shipping_weight}}</td>
                    <td>{{$warehouse->inventory_quantity}}</td>
                    <td>{{$warehouse->inventory_weight}}</td>
                    <td>{{$warehouse->remark}}</td>
                    <td><a href="/purchase/{{$warehouse->id}}/edit" class="btn btn-light">修改</a></td>
                        </tr>
                        @endforeach
                    @endif
                </table>
            
            </div>
            <a href="/excel/export" class="btn btn-success">輸出EXCEL</a>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row">
        <div class="col-1">
            
        
        </div>
        
        
        
        
        
    </div>
    
@endsection
@extends('layouts.app')
@section('content')

<!--上層按鈕-->




<!--主要內容-->

<div class="container-fluid" >
    <div class="row">
        
            @include('layouts.menu')
        
        <div class="col-10 filter">
            <div class="col">
                <div class="text-center" style="font-size:32px">出貨單</div>
                <div class="row justify-content-center">
                <div class="col-6 align-self-center main_table">
                    {!! Form::open(['action'=>'PagesController@shipping','method'=>'POST']) !!}
                        {{ csrf_field() }}
                    <table class="table table_striped" style="overflow:auto;white-space: nowrap;">
                        <tbody>
                            <tr>
                                <td>訂單號碼</td>
                                <td>{{Form::text('tracking_number','')}}</td>
                            </tr>
                            <tr>
                                <td>品名</td>
                                <td>{{Form::text('inventory_name','')}}</td>
                            </tr>
                            <tr>
                                <td>庫存疋數</td>
                                <td>{{Form::text('inventory_quantity','')}}</td>
                            </tr>
                            <tr>
                                <td>庫存公斤數</td>
                                <td>{{Form::text('inventory_weight','')}}</td>
                            </tr>
                            <tr>
                                <td>出貨日期</td>
                                <td>{{Form::date('shipping_date', \Carbon\Carbon::now())}}</td>
                            </tr>
                            <tr>
                                <td>出貨疋數</td>
                                <td>{{Form::text('shipping_quantity','')}}</td>
                            </tr>
                            <tr>
                                <td>出貨公斤數</td>
                                <td>{{Form::text('shipping_weight','')}}</td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                    @include('inc.message')
                    {{Form::submit('送出')}}
                    {!! Form::close() !!}
                    
                </div>
            </div>
            </div>
        </div>
        <div class="col-1"></div>
    
        
        
        
        {{-- @include('layouts.menu') --}}
        
    </div>
</div>
@endsection
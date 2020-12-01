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
    {{-- 篩選 --}}
    <div class="row">
        @include('layouts.menu')
        <div class="col-10 filter">
            <div class="text-center" style="font-size:32px">歷史紀錄</div>
            <div class="row justify-content-center">
            <div class="col-6 align-self-center main_table">
                <table class="table table_striped" style="overflow:auto;white-space: nowrap;">
                    <thead>
                        <tr><th>日期</th><th>訂單編號</th><th>動作</th><th></th></tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $history)
                    <tr>
                        <td>{{$history->created_at}}</td>
                        <td>{{$history->tracking_number_new}}</td>
                        <td>{{$history->action}}</td>
                    <td><a href="/WHmanagement/public/history/{{$history->id}}" class="btn btn-light">詳情</a></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    </div>
    
</div>        

@endsection
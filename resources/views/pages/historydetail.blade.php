@extends('layouts.app')
@section('content')

<!--上層按鈕-->




<!--主要內容-->
@include('inc.message')
<div class="container-fluid h-100" >
    {{-- 篩選 --}}
    <div class="row h-100">
        @include('layouts.menu')
        <div class="col-10  filter">
            
            @foreach ($history as $history)
            <?php
            $history_values =array_values(json_decode($history,true));
            $history_keys_cn = array_values($history_keys);
            ?>
            
            <h3 class="text-center">訂單編號:{{$history->tracking_number_new}}  動作:{{$history->action}}</h3>
            <div class="row justify-content-center">
            <div class="col-6 main_table">
                <table class="table table_striped" style="overflow:auto;white-space: nowrap;">
                    <thead>
                        <tr><th>修改內容</th><th>修改前</th><th>修改後</th></tr>
                    </thead>
                    <tbody>
                            @for ($i = 2; $i < count($history_values)-4; $i=$i+2)
                                @if ($history_values[$i] != $history_values[$i+1])
                                    <tr><td>{{$history_keys_cn[$i]}}</td><td>{{$history_values[$i]}}</td><td>{{$history_values[$i+1]}}</td></tr>
                                @endif
                            @endfor
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
        
        </div>
        
        
    </div>
    
</div>        

    
@endsection
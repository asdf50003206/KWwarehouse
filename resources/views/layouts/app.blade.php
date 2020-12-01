<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>倉儲管理系統</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <style>
            @import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
            
            a{
                text-decoration: none;
                color: black;
            }
            .title{
                background-color: 	#79FF79;
                font-size: 30px;
                font-family: 'Noto Sans TC', sans-serif;
                padding: 10px;
                border-radius: 10px;
                margin-bottom: 20px;
            }
            .main_table{
                border: 1px solid black;
                border-radius:5px;
                height: 600px;
                overflow: auto;
            }
            .actived{
                background-color: 	#00EC00;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
                border: 1px solid white;
                padding: 4px;
            }
            .not_actived{
                background-color: 	#CEFFCE;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
                border: 1px solid white;
                padding: 4px;
            }
            .actived_right{
                background-color: 	#00EC00;
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                border: 1px solid white;
                padding: 4px;
            }
            .not_actived_right{
                background-color: 	#CEFFCE;
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                border: 1px solid white;
                padding: 4px;
            }
            .main_table table tr td{
                padding: 10px;
                white-space: nowrap;
            }
            .filter{
                border:1px solid black;
                border-radius: 5px;
                margin-bottom: 10px;
            }
            .menu{
                background-color: #DCDCDC;
            }
            .main_table table thead th{
                position:sticky;
                top: 0 ;
                background-color: #fff;
            }
        </style>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
        <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });

        </script>

    
    </head>
    <body>

        <!--標題-->
        {{-- <div class="container-fluid title">倉儲管理系統</div> --}}

        @yield('content')
        </div>
    </body>
</html>


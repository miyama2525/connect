<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>connect</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: migmix;
                font-style: normal;
                font-weight: normal;
                src: url("{{ storage_path('fonts/migmix-2p-regular.ttf')}}") format('truetype');
            }
            @font-face{
                font-family: migmix;
                font-style: bold;
                font-weight: bold;
                src: url("{{ storage_path('fonts/migmix-2p-bold.ttf')}}") format('truetype');
            }
            body {
                font-family: migmix;
                line-height: 80%;
            }

            table{
                width: 100%;
                border-spacing: 0;
                border-collapse: collapse;
            }
            
            table th{
                border: solid 2px #FADAD8;
                padding: 10px 0;
                width: 30%;
            }
            
            table td{
                border: solid 2px #FADAD8;
                text-align: center;
                padding: 10px;
                width: 30%;
            }
            .table_button{
                margin: 10px;
                font-size: 20px;
                color: #CE6D39;
                background-color: #FADAD8;
                text-align: center;
                border:1px solid rgb(206, 111, 59, 0.2);
                border-radius: 8px;
                display: block;
            }
            p {
                font-size:20px;
                margin:20px;
                color: #534847;
                border-color: #CE6D39;
            }
            body{
                margin:20px auto;
                width:80%;
                height: 100%;
                color:#CE6D39;
            }
            .send_div{
                display: flex;
                justify-content: end;
                margin-right:20px;
            }

        </style>
</head>
<body>
    <div>
        <table>
            @foreach($contents as $content)

            <tr><th style="width:50%">タイトル</th></tr>
            <tr><td>{{ $content->title }}</td></tr>

            <tr><th>内容</th></tr>
            <tr><td>{{ $content->content }}</td></tr>

            <tr><th>その他</th></tr>
            <tr><td>{{ $content->other }}</td></tr>

            @endforeach
        </table>
        <div class="send_div">
            <a href="{{ route('dashboard') }}" class="p">HOMEへ戻る</a>
    
        </div>
    </div>
</body>
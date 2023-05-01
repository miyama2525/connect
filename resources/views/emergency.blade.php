<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>connect</title>
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    </x-app-layout>
    <link rel="stylesheet" href="/style.css" >
</head>
<body>

@canany(['teacher'])
    <form method="POST" action="{{ route('store_emergency') }}">
        @csrf
        <div>
            
            <!-- タイトル -->
            <div>
                <p>タイトル</p>
                <input id="title" class="text_title" type="text" name="title" :value="old('title')" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <!-- 内容 -->
            <div class="mt-4">
                <p>内容</p>
                <textarea id="body" class="text_box" type="text" name="body" >{{ old('body') }}</textarea>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>
            
            <button class="ml-4 button">投稿する</button>
        </div>
    </form>

    @foreach($T_emergencies as $emergency)
        <div style ="align-items: flex-start;
            flex-direction: column;">
            <p class = "text">{{$emergency->created_at}}</p>
            <p>{{$emergency->title}}</p>
            <p>{{$emergency->body}}</p>
            <a href="{{route('delete_emergency',$emergency->id)}}" class="send_button" onclick='return Checkdelete()' >削除</a>

        </div>
    @endforeach

@endcanany

@can('guardian')
    <div class = "title">
        <p>緊急連絡</p>
    </div>

    @foreach($emergencies as $emergency)
    <div class = "flex_div">
        <p class = "text">{{$emergency->created_at}}</p>
        <p style="width:50%">{{$emergency->title}}</p>
        <p style="width:50%">{{$emergency->body}}</p>
        @if($emergency->read == 0 )
        <a href="{{ route('read_emergency',$emergency->emergency_id) }}" class="ok_button" >内容を既読</a>
        @endif
        <br>
    </div>
    @endforeach

@endcan

<script type="text/javascript">

    function Checkdelete(){
      if(confirm('変更します。よろしいですか？')){
      /*削除OKの時の処理 */
        return true;
      }else{
        /*キャンセルの時の処理*/
        return false;
      }
    }
</script>

</body>
</html>
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
@can('guardian')
    <form  method="post" action="{{ route('store_absence') }}">
        @csrf
        <div class="form-group">
            <p class="title">日にちを入力</p>
            <input type="date" class="form-control select_box" id="ab_date" name="ab_date" value="{{ old('ab_date') }}" style="display: block;">
        </div>
        <!-- カテゴリー選択 -->
        <p>*理由は必須となっております</p>
        <select id="reason" name="reason_id" value="{{ old('reason') }}" class="select_box">
            @foreach($reasons as $id => $reason_name)
            <option value="{{$id}}">{{$reason_name}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <p>その他理由</p>
            <input type="text" class="text_title" id="other" name="other" value="{{ old('other') }}">
        </div>

        <div class="form-group">
            <button class="send_button">送信</button>
        </div>
    </form>
<p class="title">連絡済みの欠席連絡</p>
    @foreach($absences as $absence)
            <?php $reason = $absence->reason_id;
                $other = $absence->other;
                
            ?>
        <div class="flex_div">
                <p style = "background-color:#FADAD8;">日付</p>
                <p>{{ $absence->ab_date }}</p>
            @if($reason != 'null')
                <p style = "background-color:#FADAD8;">理由</p>
                <p>{{ $absence->reason_name }}</p>
            @endif
            @if( $other != 'null')
                <p style = "background-color:#FADAD8;">その他</p>
                <p>{{ $absence->other }}</p>
            @endif
                <a href="{{route('delete_absence',$absence->id)}}"  onclick='return Checkdelete()' class="button">削除</a>
        </div>
    @endforeach
@endcan

@canany(['teacher','admin'])
    <form  method="post" action="{{ route('search_absence') }}">
        @csrf
        <div class="form-group">
            <p class="title">休みの申請状況</p>
            <p>日にちを入力</p>
            <input type="date" class="form-control select_box" id="where_date" name="where_date" value="{{ old('where_date') }}">
        </div>
        <div class="form-group">
            <button class="send_button" name="search_content">検索</button>
        </div>
    </form>
        @if(empty($days))
            @foreach($today_ab as $today)
            <div class="flex_div">
                <?php $reason = $today->reason_id;
                    $other = $today->other;
                ?>
                    <p>{{ $today->ab_date}}</p>
                    <p>{{ $today->child_name}}</p>
                @if($reason != 'null')
                    <p>{{ $today->reason_name}}</p>
                @endif
                @if( $other != 'null')
                    <p>{{ $today->other}}</p>
                @endif
            </div>
            @endforeach
        @else

            @foreach($days as $day)
                <?php $reason = $day->reason_id;
                    $other = $day->other;
                ?>
                    <p>{{ $day->child_name }}</p>
                @if($reason != 'null')
                    <p>{{ $day->reason_name }}</p>
                @endif
                @if( $other != 'null')
                    <p>{{ $day->other }}</p>
                @endif

            @endforeach
        @endif
@endcanany

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
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
            <?php $reason_id = $absence->reason_id;
                $other = $absence->other;
            ?>
        <div class="flex_div">
                <p style = "background-color:#FADAD8;">日付</p>
                <p>{{ $absence->ab_date }}</p>
                <p style = "background-color:#FADAD8;">理由</p>
            @if($reason_id != null)
                <p>{{ $absence->reason_name }}</p>
            @endif
            <p style = "background-color:#FADAD8;">その他</p>
            @if( $other != null)
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
                <?php $reason_id = $today->reason_id;
                    $other = $today->other;
                ?>
                    <p>{{ $today->ab_date}}</p>
                    <p>{{ $today->child_name}}</p>
                @if($reason_id != null)
                    <p>{{ $today->reason_name}}</p>
                @endif
                @if( $other != null)
                    <p>{{ $today->other}}</p>
                @endif
            </div>
            @endforeach
        @else

            @foreach($days as $day)
            <p>検索日付{{ $day->ab_date }}</p>
            <table>
            <?php $reason_id = $day->reason_id;
                    $other = $day->other;
            ?>
                <tr>
                <th style = "background-color:#FADAD8;">名前</th>
                <th style = "background-color:#FADAD8;">理由</th>
                <th style = "background-color:#FADAD8;">その他理由</th></tr>
                
                <tr>
                    <td><p>{{ $day->child_name }}</p></td>

                    @if($reason_id != null)
                    <td><p>{{ $day->reason_name }}</p></td>
                    @endif

                    @if( $other != null)
                    <td><p>{{ $day->other }}</p></td>
                    @endif
                </tr>
            </table>
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
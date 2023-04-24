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
<div>
        <!--プルダウンカテゴリ選択-->
        <form method="POST" action="{{ route('search_registrant')}}">
            @csrf
            <div class="form-group row">
                <p class = "title">投稿一覧</p>
                <div class="col-sm-3">
                    <select 
                        id="child_sort"
                        name="child_sort"
                        class="form-control {{ $errors->has('') ? 'is-invalid' : '' }} select_box"
                        value="{{ old('child_sort') }}">
                            <option value="grade_asc">学年（昇順）</option>
                            <option value="grade_desc">学年（降順）</option>
                    </select>
                </div>
                <button class="send_button">検索</button>
            </div>
        </form>
    </div>
    <div>
        <table style="margin-top:20px;">
        @foreach($children as $child)
        <?php $grade =[
            '未満児(１歳)',
            '未満児(２歳)',
            '年少',
            '年中',
            '年長',
        ];
        $s_grade = ($child->grade_id)-1;
        ?>
            <tr>
                <th>名前</th>
                <th>誕生日</th>
                <th>学年</th>
                <th></th>
            </tr>
            <tr>
                <td>{{ $child->child_name }}</td>
                <td>{{ $child->birthday }}</td>
                <td><?php echo $grade[$s_grade];?></td>
                <td><a href="{{ route('search_guardian',$child->user_id) }}" class = "send_button" style="margin:0;padding:0;">保護者情報</a></td>
            </tr>
        @endforeach
        </table>
    </div>
</body>
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
    <!-- 保護者画面 -->

        @if(!empty($emergency_reads))
            <a href = "{{route('create_emergency')}}"><p>未読のお知らせがあります</p></a>
        @endif
        @if(empty($empty_guardians))
        <a href = "{{route('create_other')}}"><p>保護者情報を登録してください</p></a>
        @endif
        @if(empty($empty_children))
        <a href = "{{route('create_other')}}"><p>お子様の情報を登録してください</p></a>
        @endif
        <div class="button_div">
            <a href="{{ route('post_content') }}" class="button">おたより</a>
            <a href="{{ route('create_absence') }}" class="button">欠席の連絡</a>
            <a href="{{ route('create_emergency') }}" class="button">緊急連絡</a>
        </div>
    
        @endcan

    @canany(['teacher','admin'])
    <!-- 保護者以外画面 -->
    <div class="button_div">
        <a href="{{ route('post_content') }}" class="button">記事の投稿</a>
        <a href="{{ route('create_absence') }}" class="button">欠席の連絡</a>
        <a href="{{ route('create_emergency') }}" class="button">緊急連絡</a>
        <a href="{{ route('search_registrant') }}" class="button">登録者情報一覧</a>
    </div>
        @endcanany
</body>
</html>

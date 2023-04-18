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
    <p>登録が完了しました。</p>
        <a href="{{ route('dashboard') }}"><button class="button">HOMEへ戻る</button></a>
        <a href="{{ route('post_content') }}"><button class="button">おたよりへ戻る</button></a>
</body>
</html>
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
        <table style="margin-top:40px;">
        @foreach($guardians as $guardian)

            <tr>
                <th>名前</th>
                <th>電話番号</th>
                <th>職場連絡先</th>
                <th>続柄</th>
            </tr>
            <tr>
                <td>{{ $guardian->guardian_name }}</td>
                <td>{{ $guardian->tel }}</td>
                <td>{{ $guardian->workplace }}</td>
                <td>{{ $guardian->relationship }}</td>
            </tr>

        @endforeach
        </table>
    </div>
</body>
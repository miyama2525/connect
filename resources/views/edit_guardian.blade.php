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
    <p>保護者情報追加</p>
    <form method="POST" action="{{ route('edit_guardian') }}">
        @csrf
        <div>
            <!-- Guardian_name -->
            <div class="mt-4">
                <x-input-label for="guardian_name" :value="__('Guardian_name')" class="p"/>
                <input id="guardian_name" class="text_title" type="text" name="guardian_name" :value="old('guardian_name')" required/>
                <x-input-error :messages="$errors->get('guardian_name')" class="mt-2" />
            </div>
            <!-- tel -->
            <div class="mt-4">
                <x-input-label for="tel" :value="__('Tel')" class="p"/>
                <input id="tel" class="text_title" type="text" name="tel" :value="old('tel')" required/>
                <x-input-error :messages="$errors->get('tel')" class="mt-2" />
            </div>
            <!-- workplace -->
            <div class="mt-4">
                <x-input-label for="workplace" :value="__('Workplace')" class="p"/>
                <input id="workplace" class="text_title" type="text" name="workplace" :value="old('workplace')" required/>
                <x-input-error :messages="$errors->get('workplace')" class="mt-2" />
            </div>
            <!-- relationship -->
            <div class="mt-4">
                <x-input-label for="relationship" :value="__('Relationship')" class="p"/>
                <input id="relationship" class="text_title" type="text" name="relationship" :value="old('relationship')" required/>
                <x-input-error :messages="$errors->get('relationship')" class="mt-2" />
            </div>
            <div class="send_div">
                <button class="send_button" >登録</button>
            </div>
        </div>
    </form>
    <div>
        <table>
        @foreach($guardians as $guardian)

            <tr><th>名前</th></tr>
            <tr><td>{{ $guardian->guardian_name }}</td></tr>

            <tr><th>電話番号</th></tr>
            <tr><td>{{ $guardian->tel }}</td></tr>

            <tr><th>職場連絡先</th></tr>
            <tr><td>{{ $guardian->workplace }}</td></tr>

            <tr><th>続柄</th></tr>
            <tr><td>{{ $guardian->relationship }}</td></tr>

        @endforeach
        </table>
    </div>
</body>
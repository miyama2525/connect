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
    <p class="title">お子様情報追加</p>
    <form method="POST" action="{{ route('edit_child') }}">
        @csrf
        <div>
            <!-- Child_name -->
            <div class="mt-4">
                <x-input-label for="child_name" :value="__('Child_name')" class="p"/>
                <input id="child_name" class="text_title" type="text" name="child_name" :value="old('child_name')" required/>
                <x-input-error :messages="$errors->get('child_name')" class="mt-2" />
            </div>
            <!-- Birthday -->
            <div class="mt-4">
                <x-input-label for="birthday" :value="__('Birthday')" class="p"/>
                <input id="birthday" class="text_title" type="text" name="birthday" :value="old('birthday')" required/>
                <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
            </div>
            <!-- Grade -->
            <div class="col-sm-3">
                <x-input-label for="garde" :value="__('Grade')" class="p"/>
                    <select 
                        id="grade_id"
                        name="grade_id"
                        class="form-control {{ $errors->has('grade_id') ? 'is-invalid' : '' }} select_box"
                        value="{{ old('grade_id') }}">
                        @foreach($grade_categories as $id => $grade_name)
                            <option value="{{ $id }}">{{ $grade_name }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="send_div">
                <button class="send_button" >登録</button>
            </div>
        </div>
    </form>
    <div>
        <table>
        @foreach($children as $child)

            <tr><th>名前</th></tr>
            <tr><td>{{ $child->child_name }}</td></tr>

            <tr><th>誕生日</th></tr>
            <tr><td>{{ $child->birthday }}</td></tr>

            <tr><th>学年</th></tr>
            <tr><td>{{ $child->garde }}</td></tr>

        @endforeach
        </table>
    </div>
</body>
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
    <!-- 上部 -->
    <form method="POST" action="{{ route('store_other') }}">
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
                <x-input-label for="grade" :value="__('Grade')" class="p"/>
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
</body>
</html>
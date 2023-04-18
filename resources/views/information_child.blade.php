<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>connect</title>
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    </x-app-layout>
</head>
<body>
    <!-- 上部 -->
    <form method="POST" action="{{ route('edit_child') }}">
        @csrf
        <div>
            <!-- Child_name -->
            <div class="mt-4">
                <x-input-label for="child_name" :value="__('Child_name')" />
                <x-text-input id="child_name" class="block mt-1 w-full" type="text" name="child_name" :value="old('child_name')" required/>
                <x-input-error :messages="$errors->get('child_name')" class="mt-2" />
            </div>
            <!-- Birthday -->
            <div class="mt-4">
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" class="block mt-1 w-full" type="text" name="birthday" :value="old('birthday')" required/>
                <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
            </div>
            <!-- Garde -->
            <div class="mt-4">
                <x-input-label for="garde" :value="__('Garde')" />
                <x-text-input id="garde" class="block mt-1 w-full" type="text" name="garde" :value="old('garde')" required/>
                <x-input-error :messages="$errors->get('garde')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="ml-4" >登録</x-primary-button>
            </div>
        </div>
    </form>
</body>
</html>
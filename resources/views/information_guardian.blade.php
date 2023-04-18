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
    <form method="POST" action="{{ route('edit_guardian') }}">
        @csrf
        <div>
            <!-- Guardian_name -->
            <div class="mt-4">
                <x-input-label for="guardian_name" :value="__('Guardian_name')" />
                <x-text-input id="guardian_name" class="block mt-1 w-full" type="text" name="guardian_name" :value="old('guardian_name')" required/>
                <x-input-error :messages="$errors->get('guardian_name')" class="mt-2" />
            </div>
            <!-- tel -->
            <div class="mt-4">
                <x-input-label for="tel" :value="__('Tel')" />
                <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required/>
                <x-input-error :messages="$errors->get('tel')" class="mt-2" />
            </div>
            <!-- workplace -->
            <div class="mt-4">
                <x-input-label for="workplace" :value="__('Workplace')" />
                <x-text-input id="workplace" class="block mt-1 w-full" type="text" name="workplace" :value="old('workplace')" required/>
                <x-input-error :messages="$errors->get('workplace')" class="mt-2" />
            </div>
            <!-- relationship -->
            <div class="mt-4">
                <x-input-label for="relationship" :value="__('Relationship')" />
                <x-text-input id="relationship" class="block mt-1 w-full" type="text" name="relationship" :value="old('relationship')" required/>
                <x-input-error :messages="$errors->get('relationship')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="ml-4" >登録</x-primary-button>
            </div>
        </div>
    </form>
</body>
</html>
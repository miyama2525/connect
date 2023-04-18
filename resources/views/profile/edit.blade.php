<x-app-layout>
<link rel="stylesheet" href="/style.css" >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="send_div profile">
            <a href = "{{route('create_guardian')}}" class="send_button">保護者様の情報</a>
            <a href = "{{route('create_child')}}" class="send_button">お子様の情報</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="login_div" style = "border:1px solid #FADAD8;">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="login_div" style = "border:1px solid #FADAD8;">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="login_div" style = "border:1px solid #FADAD8;">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

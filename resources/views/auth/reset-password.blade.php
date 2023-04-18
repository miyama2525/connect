<x-guest-layout>
    
    <form method="POST" action="{{ route('password.store') }}" class="login_div">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="login_div">
            <x-input-label for="email" :value="__('Email')" class="p"/>
            <input id="email" class="login_text" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="login_div">
            <x-input-label for="password" :value="__('Password')" class="p"/>
            <input id="password" class="login_text" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="login_div">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="p"/>

            <input id="password_confirmation" class="login_text"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="send_div">
            <button class=send_button>
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-guest-layout>

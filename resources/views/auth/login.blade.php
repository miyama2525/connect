<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="register_div">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register_button">新規登録</a>
                        @endif
                </div>
            
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="login_div">
            <x-input-label for="email" :value="__('Email')" class="p"/>
            <input id="email" class="login_text" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="login_div">
            <x-input-label for="password" :value="__('Password')" class="p"/>

            <x-text-input id="password" class="login_text"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="p">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" style="margin-top:20px;">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4" style="margin-top:20px;">
            @if (Route::has('password.request'))
                <a class="p" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="send_div">
                <button class="send_button" style="margin-bottom:20px;">
                    {{ __('Log in') }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>

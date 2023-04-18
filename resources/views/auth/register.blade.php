<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- Email Address -->
        <div class="login_div">
            <x-input-label for="email" :value="__('Email')" class="p"/>
            <input id="email" class="login_text" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="login_div">
            <x-input-label for="password" :value="__('Password')" class="p"/>

            <input id="password" class="login_text"
                            type="password"
                            name="password"
                            required autocomplete="new-password" class="p"/>

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

        <!-- role -->
            <select class="select_box p" name="role" id="role">
                <option value="1">先生</option>
                <option value="11" selected>保護者</option>
            </select>
        
        <div class="flex items-center justify-end mt-4">
            <a class="p" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <div class="send_div" style="margin-bottom:12px;">
                <button class="send_button">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>

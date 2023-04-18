<x-guest-layout>
    <div class="p">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="login_div">
        @csrf

        <!-- Email Address -->
        <div class="login_div">
            <x-input-label for="email" :value="__('Email')" class="p"/>
            <input id="email" class="login_text" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="p">
            <button class="send_button">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>

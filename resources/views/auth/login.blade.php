<x-guest-layout>
    <x-authentication-card>
        <style>
            img {
                height: auto;
                width: 100px;
            }
            h2{
                font-family: 'Century Gothic'sans-serif;
                font-weight: bolder;
                text-align: center;
                color: #371B58;
            }
        </style>
        <x-slot name="logo">
            <img src="{{ asset('imgs\qnq_logo.png') }}" alt="Logo"/>
        </x-slot>
        <h2>QUIRK 'N QUILL STATIONERY</h2>
        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-button class="ms-4" style="background-color: #371B58; color: #fff;">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>

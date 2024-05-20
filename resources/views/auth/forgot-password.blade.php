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
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button style="background-color: #371B58; color: #fff;">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

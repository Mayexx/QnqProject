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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button style="background-color: #371B58; color: #fff;">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

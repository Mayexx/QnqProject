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
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="ms-4" style="background-color: #371B58; color: #fff;">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

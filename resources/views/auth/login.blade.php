<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ env('APP_URL') }}">
                <x-application-logo class="h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Permanecer conectado') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>
                @endif
                
                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
            <div class="flex items-center justify-end mt-4" style="display:none">
                <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=openid%20email%20profile&amp;state=f971fd78e7e624e998c15d0dc8f77062&amp;response_type=code&amp;redirect_uri=https%3A%2F%2Fagathon.siger.win%2Fbot&amp;client_id=751074459699-eamj9dgltibr9fqnbfk9qg8c2g886feo.apps.googleusercontent.com">
                    <button type="button" class="btn btn-primary" style="background: #4285f4;
                        padding: 10px;
                        color: white;
                        border-radius: 10px;">
                            <i class="bi bi-google"></i> Google Login
                    </button>
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

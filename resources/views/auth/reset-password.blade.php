<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Infinity') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ asset('css/logo2.png')}}" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <img src="{{ asset('css/logo2.png') }}" width="100px" height="100px" alt="App Logo" >
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-4 mb-3">
                      <label for="show_pass" class="inline-flex items-center">
                          <input id="show_pass" onclick="togglePassword()" type="checkbox" class="rounded light:bg-gray-900 border-black-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="show_pass">
                          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show Password') }}</span>
                      </label>
                  </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="block mt-4 mb-3">
                      <label for="show_confirm_pass" class="inline-flex items-center">
                          <input id="show_confirm_pass" onclick="togglePassword1()" type="checkbox" class="rounded light:bg-gray-900 border-black-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="show_confirm_pass">
                          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show Password') }}</span>
                      </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>

<script>
    function togglePassword(){
        const passwordInput = document.getElementById("password");
        if(passwordInput.type === 'password'){
            passwordInput.type = 'text';
        }else{
            passwordInput.type = 'password';
        }
    }
</script>
<script>
    function togglePassword1(){
        const passwordInput = document.getElementById('password_confirmation');
        if(passwordInput.type === 'password'){
            passwordInput.type = 'text';
        }else{
            passwordInput.type = 'password';
        }
    }
</script>
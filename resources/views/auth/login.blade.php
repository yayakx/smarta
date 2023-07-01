<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">                   
        </x-slot>

        <div  class="text-center">
            <img src="{{asset('img/logo-unesa.png')}}" class="d-block h-20 w-20  mx-auto"/>
            <h4><b>SMART-A</b></h4>
            <h5><b>Aplikasi Akreditasi Prodi</b></h5>
            <span class="text-sm">
                Prodi Pendidikan Bahasa dan Sastra Indonesia
                <br>Prodi Sastra Indonesia
            </span>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" placeholder="Masukkan Email Anda" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Masukkan Password Anda" 
                                required autocomplete="current-password" />
            </div>           

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Belum Punya Akun? Daftar Yuk') }}
                    </a>
                @endif

                <x-button class="ml-3 bg-primary">
                    {{ __('Masuk') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

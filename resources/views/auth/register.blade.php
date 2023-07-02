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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nama')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="level" :value="__('Sebagai')" />

                <select id="level" class="form-control block mt-1 w-full"                                
                                name="level" required> 
                <option value="1">Mahasiswa</option>
                <option value="2">Dosen</option>
                <option value="3">Tendik</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah Punya Akun?') }}
                </a>

                <x-button class="bg-primary ml-4">
                    {{ __('Daftar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<x-guest-layout>
    <div style="text-align: center;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 60%; height: auto; display: block; margin: 0 auto;">
        <h2 class="text-center text-2xl font-semibold mb-4">{{ __('FORM REGISTRASI') }}</h2>
    </div>
    
    <form method="POST" action="{{ route('register') }}" class="mb-8">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required autocomplete="bday" />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full" required>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autocomplete="street-address" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- Kota -->
        <div class="mt-4">
            <x-input-label for="kota" :value="__('Kota')" />
            <x-text-input id="kota" class="block mt-1 w-full" type="text" name="kota" :value="old('kota')" required autocomplete="address-level2" />
            <x-input-error :messages="$errors->get('kota')" class="mt-2" />
        </div>

        <!-- Nomor HP -->
        <div class="mt-4">
            <x-input-label for="nomor_hp" :value="__('Nomor HP')" />
            <x-text-input id="nomor_hp" class="block mt-1 w-full" type="text" name="nomor_hp" :value="old('nomor_hp')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('nomor_hp')" class="mt-2" />
        </div>

        <!-- PayPal ID -->
        <div class="mt-4">
            <x-input-label for="paypal_id" :value="__('PayPal ID')" />
            <x-text-input id="paypal_id" class="block mt-1 w-full" type="text" name="paypal_id" :value="old('paypal_id')" autocomplete="paypal" />
            <x-input-error :messages="$errors->get('paypal_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

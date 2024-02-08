<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype= multipart/form-data>
        @csrf
        <div class="mt-4">
            <x-input-label for="profilepicture" :value="__('Profile Picture')" />
            <x-text-input id="profilepicture" class="block mt-1 w-full" type="file" name="profilepicture" />
            <x-input-error :messages="$errors->get('profilepicture')" class="mt-2" />
        </div>
        
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
        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phonenumber" :value="__('Phone Number')" />
            <x-text-input id="phonenumber" class="block mt-1 w-full" type="text" name="phonenumber" :value="old('phonenumber')" />
            <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
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
        <!-- Role -->
<div class="mt-4">
    <x-input-label for="role" :value="__('Role')" />
    <select id="role" name="role" class="block mt-1 w-full" required>
        <option value="passenger">Passenger</option>
        <option value="driver">Driver</option>
    </select>
    <x-input-error :messages="$errors->get('role')" class="mt-2" />
</div>

<!-- Additional Inputs for Driver -->
<div id="driverInputs" class="hidden">
    <!-- Description -->
    <div class="mt-4">
        <x-input-label for="Description" :value="__('Description')" />
        <x-text-input id="Description" class="block mt-1 w-full" type="text" name="Description" :value="old('Description')" />
        <x-input-error :messages="$errors->get('Description')" class="mt-2" />
    </div>

    <!-- Payment -->
    <div class="mt-4">
        <x-input-label for="Payment" :value="__('Payment Method')" />
        <select id="Payment" name="Payment" class="block mt-1 w-full" required>
            <option value="cash">Cash</option>
            <option value="card">Card</option>
        </select>
        <x-input-error :messages="$errors->get('Payment')" class="mt-2" />
    </div>
</div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        document.getElementById('role').addEventListener('change', function () {
            var driverInputs = document.getElementById('driverInputs');
            if (this.value === 'driver') {
                driverInputs.style.display = 'block';
            } else {
                driverInputs.style.display = 'none';
            }
        });
    </script>
</x-guest-layout>

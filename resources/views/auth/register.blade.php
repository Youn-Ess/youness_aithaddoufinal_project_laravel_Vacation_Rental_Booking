<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <h3 class="text-white font-bold">Sign Up</h3>
            <p class="text-gray-400 ">It's quick and easy.</p>
        </div>

        <div class="grid grid-cols-2 gap-1">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>



            <!-- city Address -->
            <div class="">
                <x-input-label for="city" :value="__('city')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="grid grid-cols-2 gap-1">
            <!--  gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('gender')" />
                <select class="block mt-1 w-full bg-[#111827] rounded-md text-white" name="gender" id="gender">
                    <option value="" disabled selected>select gender</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- roles -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('role')" />
                <select class="block mt-1 w-full bg-[#111827] rounded-md text-white" name="role" id="role">
                    <option value="" disabled selected>select you role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>
        </div>

        {{-- image --}}

        <div class="mt-4">
            <x-input-label for="image" :value="__('image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" 
                autocomplete="image" />

            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>


        <div class="grid grid-cols-2 gap-1 mt-4">
            <!-- Password -->
            <div class="">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-secondary-color hover:text-secondary-color  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

        </div>
        <button class="py-2 px-4 rounded-full bg-secondary-color w-full mt-4">SignUp</button>
    </form>
</x-guest-layout>

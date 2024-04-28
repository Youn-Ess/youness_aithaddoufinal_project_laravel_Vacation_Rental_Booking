<section class="">
    <header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <label for="name">Name</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full " :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="name">Email</label>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 ">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- image -->
        <div>
            <label for="name">Image</label>
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                required autofocus autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!--  gender -->
        <div class="mt-4">
            <label for="name">Gender</label>
            <select class="block mt-1 w-full bg-[#111827] rounded-md text-white" name="gender" id="gender">
                <option value="" disabled selected>select gender</option>
                <option @selected($user->gender == 'male') value="male">male</option>
                <option @selected($user->gender == 'female') value="female">female</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- city Address -->
        <div class="mt-4">
            <label for="name">City</label>
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city', $user->city)"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>


        <div class="flex items-center gap-4">
            <button class="btn btn-secondary">save</button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

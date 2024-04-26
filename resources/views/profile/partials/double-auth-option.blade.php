<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('2FA') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Two-factor authentication (2FA) adds extra protection to your account by requiring a unique code sent to your email, in addition to your password. It s an essential security measure that makes it much harder for hackers to gain access to your account. Enabling 2FA with email verification helps ensure your account stays secure.') }}
        </p>
    </header>

    <form action="{{ route('doubleAuth.switchAuthOption') }}" method="post">
        @csrf
        <button class="btn btn-secondary">{{ $user->double_auth_permition ? 'disable 2FA' : 'enable 2FA' }}</button>
    </form>
</section>

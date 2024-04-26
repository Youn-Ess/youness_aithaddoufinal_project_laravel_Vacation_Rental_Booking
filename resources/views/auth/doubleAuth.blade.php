<x-guest-layout>

    <p class="text-white">You have received an email which contains login code, If you haven't received it, press <a
            href="{{ route('doubleAuth.resendCode') }}">here</a></p>
    <form class="flex flex-col gap-3" method="POST" action="{{ route('doubleAuth.verityCode') }}">
        @csrf
        <div class="flex flex-col ">
            <input class="border-none rounded-md" name="code" type="number" placeholder="put the code">
            @error('errorMessage')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- <a class="underline text-sm text-blue-400 hover:text-blue-500 " href="{{ route('login') }}">
            go back home
        </a> --}}
        <button class="btn btn-primary w-full">submit</button>
    </form>
</x-guest-layout>

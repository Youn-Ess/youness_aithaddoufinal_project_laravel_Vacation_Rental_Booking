<!-- component -->
<!-- This is an example component -->
<div
    class="relative lg:w-[20vw] w-[100%]  group min-w-0 mt-16  break-words bg-white  shadow-2xl dark:bg-gray-800 dark:border-gray-700 md:max-w-sm rounded-xl">
    <div class="pb-6 h-[100%]">
        <div class="flex flex-wrap justify-center">
            <div class="flex justify-center w-full">
                <div class="relative">
                    <img src="{{ asset('storage/' . $user->image) }}"
                        class="dark:shadow-xl border-white dark:border-gray-800 rounded-full align-middle border-8 absolute -m-16 -ml-18 lg:-ml-16 max-w-[130px]" />
                </div>
            </div>
        </div>
        <div class="mt-20 text-center">
            <h3 class="mb-1 text-2xl font-bold leading-normal text-gray-700 dark:text-gray-300">{{ $user->name }}
            </h3>
            <div class="flex flex-row justify-center w-full mx-auto space-x-2 text-center">
                <!-- /typography/_h3.antlers.html -->
                <p class="font-bold tracking-wide text-gray-600 dark:text-gray-300 font-mono text-xl">
                    {{ $user->getRoleNames()[0] }} ,</p>
                <p class="font-bold tracking-wide text-gray-600 dark:text-gray-300 font-mono text-xl">
                    {{ $user->gender }}</p>
                <!-- End: /typography/_h3.antlers.html -->
            </div>
        </div>
        <div class="pt-6 mt-6 text-center border-t border-gray-200 dark:border-gray-700/50">
            <div class="flex flex-wrap justify-center">
                <div class="w-full px-2">
                    {{-- <p class="mb-4 font-light leading-relaxed text-gray-600 dark:text-gray-400"><span
                            class="font-lato_bold">Email: </span>{{ $user->email }}</p> --}}
                </div>
            </div>
            <div class="flex flex-wrap justify-start gap-2 mx-6">
                <a href="{{ route('admin.editUser', $user) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-full transition duration-200 ease-in-out hover:bg-blue-700 active:bg-blue-900 focus:outline-none no-underline">
                    edit
                </a>

                <a href="{{ route('admin.properties_index', $user->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-full transition duration-200 ease-in-out hover:bg-blue-700 active:bg-blue-900 focus:outline-none">
                    show properties
                </a>
            </div>
        </div>
        <div class="relative h-6 overflow-hidden translate-y-6 rounded-b-xl border">
            <div class="absolute flex -space-x-12 rounded-b-2xl">
                <div
                    class="w-36 h-8 transition-colors duration-200 delay-75 transform skew-x-[35deg] bg-amber-400/90 group-hover:bg-amber-600/90 z-10">
                </div>
                <div
                    class="w-28 h-8 transition-colors duration-200 delay-100 transform skew-x-[35deg] bg-amber-300/90 group-hover:bg-amber-500/90 z-20">
                </div>
                <div
                    class="w-28 h-8 transition-colors duration-200 delay-150 transform skew-x-[35deg] bg-amber-200/90 group-hover:bg-amber-400/90 z-30">
                </div>
                <div
                    class="w-28 h-8 transition-colors duration-200 delay-200 transform skew-x-[35deg] bg-amber-100/90 group-hover:bg-amber-300/90 z-40">
                </div>
                <div
                    class="w-28 h-8 transition-colors duration-200 delay-300 transform skew-x-[35deg] bg-amber-50/90 group-hover:bg-amber-200/90 z-50">
                </div>
            </div>
        </div>
    </div>
</div>

<x-app-layout>
    <section class="">
        <div class="h-[90vh] w-full relative"
            style="background-image: url({{ asset('images/heroSectionImg.jpg') }}); background-size: cover;">
            <div class="backdrop-blur-[2px] bg-black/10 absolute inset-0 w-[60%] "></div>
            <div class="absolute inset-0">
                <div class="text-white ps-[10vw] pt-[15vh] lg:w-[45%] w-[55%]">
                    <h1 class="font-lato_regural lg:text-[3.5rem]">List and showcase your vacation rentals</h1>
                    <p class="lg:text-[1.3rem] text-[0.9rem] font-lato_light">Explore vacation rentals worldwide</p>
                    <div class="flex lg:flex-row lg:gap-4 gap-2 mt-5">

                        <a href="{{ route('properties.index') }}"
                            class="bg-red-500 w-fit text-white px-[1rem] py-[0.4rem] rounded-full transition duration-200 ease-in-out hover:bg-red-700 active:bg-red-900 focus:outline-none no-underline font-lato_light lg:text-[1rem] text-[0.9rem]">Search</a>

                        @role('owner')
                            <a class="border px-[1rem]  py-[0.4rem] rounded-full no-underline text-white font-lato_light lg:text-[1rem] text-[0.8rem]"
                                href="{{ route('properties.create') }}">List Property</a>
                        @endrole
                    </div>

                    <div class="flex lg:gap-[3rem] gap-3 pt-5">
                        <div>
                            <p class="text-[3rem] m-0 font-lato_bold">{{ count($properties) }}</p>
                            <p class="font-light">Listing</p>
                        </div>
                        <div>
                            <p class="text-[3rem] m-0 font-lato_bold">{{ count($owners) }}</p>
                            <p class="font-light">properties owners</p>
                        </div>
                        <div>
                            <p class="text-[3rem] m-0 font-lato_bold">{{ count($ranters) }}</p>
                            <p class="font-light">Happy renters</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class=" p-10">
        <h1>Top destinations this month</h1>
        <div class="h-[40vh]"></div>
    </section> --}}

    <section>
        <div class="flex flex-lg-row flex-col py-[4rem] gap-[1rem] lg:px-[13rem] px-[1.5rem]">
            <div class="lg:w-[50%] w-[100%]">
                <img class="lg:w-[25vw] w-[100%] rounded-lg" src="{{ asset('images/lastSectionImage.jpg') }}" alt="">
            </div>
            <div class="lg:w-[50%] w-[100%] flex flex-col justify-between pb-[4rem]">
                <h1 class="text-[1.8rem] font-lato_regural">
                    Find your perfect vacation rental
                    with detailed descriptions and
                    availability calendar.
                </h1>
                <a href="{{ route('properties.index') }}"
                    class="bg-red-500 w-fit text-white px-4 py-2 rounded-full transition duration-200 ease-in-out hover:bg-red-700 active:bg-red-900 focus:outline-none no-underline font-lato_light">Explore
                    Rentals</a>
            </div>
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <section class="">
        <div class="h-[90vh] w-full relative"
            style="background-image: url({{ asset('images/heroSectionImg.jpg') }}); background-size: cover;">
            <div class="bg-black opacity-70 absolute inset-0 w-[60%]"></div>
            <div class="absolute inset-0">
                <div class="text-white ps-[10vw] pt-[15vh] w-[45%]">
                    <h1 class="text-[3.5rem] font-extrabold">List and showcase your vacation rentals</h1>
                    <p class="text-[1.5rem] font-extralight">Explore vacation rentals worldwide</p>
                    <div class="flex lg:flex-row gap-4">
                        <a href="{{ route('properties.index') }}"
                            class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl no-underline text-white">Search
                            rentals</a>
                        @role('owner')
                            <a class="border border-black px-[1rem] py-[0.4rem] rounded-2xl no-underline text-white"
                                href="{{ route('properties.create') }}">List Property</a>
                        @endrole
                    </div>

                    <div class="flex gap-[3rem] pt-5">
                        <div>
                            <p class="text-[3rem] m-0">{{ count($properties) }}</p>
                            <p class="">Listing</p>
                        </div>
                        <div>
                            <p class="text-[3rem] m-0">{{ count($owners) }}</p>
                            <p class="">properties owners</p>
                        </div>
                        <div>
                            <p class="text-[3rem] m-0">{{ count($ranters) }}</p>
                            <p class="">Happy renters</p>
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
        <div class="flex py-[4rem] gap-[1rem] px-[13rem]">
            <div class="w-[50%]">
                <img class="w-[25vw] rounded-lg" src="{{ asset('images/lastSectionImage.jpg') }}" alt="">
            </div>
            <div class="w-[50%] flex flex-col justify-between pb-[4rem]">
                <h1 class="text-[1.8rem]">
                    Find your perfect vacation rental
                    with detailed descriptions and
                    availability calendar.
                </h1>
                <a href="{{ route('properties.index') }}"
                    class="bg-myPrimary text-centerpro px-[1rem] py-[0.4rem] text-center rounded-2xl w-[20%] text-white no-underline">Search</a>
            </div>
        </div>
    </section>
</x-app-layout>

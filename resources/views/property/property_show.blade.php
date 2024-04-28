<x-app-layout>
    <div class="flex justify-between p-5">
        <div class="w-[55vw] h-[70vh]">
            <img class="rounded-lg h-[80%] w-[100%]"
                src="{{ asset('storage/' . $property->propertyImages[0]->image_path) }}" alt="">
            <div class="w-[100%] grid grid-cols-4 gap-3 mt-3">
                @for ($i = 1; $i < count($property->propertyImages); $i++)
                    <img class="rounded-lg h-[20vh]"
                        src="{{ asset('storage/' . $property->propertyImages[$i]->image_path) }}" alt="">
                @endfor
            </div>
        </div>
        <div class="w-[40%] flex flex-col gap-3 py-4">
            <div>
                <h1>{{ $property->propertyTitle }}</h1>
                <p class="m-0">{{ $property->propertyDescription }}</p>
                <p class="m-0"><span class="font-bold text-[1.1rem]">type:</span> {{ $property->propertyType }}</p>
                <p class="m-0"><span class="font-bold text-[1.1rem]">number of rooms:</span> {{ $property->rooms }}
                </p>
                <p class="m-0"><span class="font-bold text-[1.1rem]">price per hour:</span> {{ $property->price }}DH
                </p>
            </div>

            <div class="flex gap-2 items-center">
                <a href="">
                    <img class="w-[3vw] rounded-full" src="{{ asset('storage/' . $property->user->image) }}"
                        alt="">
                </a>
                <p class="m-0">{{ $property->user->name }}</p>
            </div>
            @if (Auth::user()->id != $property->user->id)
                <div class="flex gap-2">
                    <a href="{{ route('calendar.show', $property) }}"
                        class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl no-underline text-white text-center w-[15%]">rent</a>
                    <a href=""
                        class="border border-black px-[1rem] py-[0.4rem] rounded-2xl no-underline text-center w-[20%] text-black">contact
                        me</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

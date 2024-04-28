<x-app-layout>

    <div class="flex justify-between">

        <div class="fixed top-0 left-0 right-0 bg-gray-100 w-[25%] h-[100vh]">
            <form method="get" class="flex flex-col gap-3 px-4 pt-[35%] max-h-[100vh]">
                <div>
                    <h4>Explore</h4>
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-1">
                            <label for="">name</label>
                            <input value="{{ Request::input('name') }}" name="name" class="border-gray-300 rounded-md"
                                type="text" placeholder="name">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1">
                                <label for="">min Budget per hour</label>
                                <input value="{{ Request::input('minBudget') }}" name="minBudget"
                                    class="border-gray-300 rounded-md" type="number" placeholder="budget">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="">max Budget per hour</label>
                                <input value="{{ Request::input('maxBudget') }}" name="maxBudget"
                                    class="border-gray-300 rounded-md" type="number" placeholder="budget">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">Location</label>
                            <input value="{{ Request::input('location') }}" name="location"
                                class="border-gray-300 rounded-md" type="text" placeholder="Location">
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Property type</h4>
                    <div class="flex flex-col gap-1">
                        <label for="">Type</label>
                        <select class="border-gray-300 rounded-md" name="propertyType" id="">
                            <option @selected(Request::input('propertyType') == '') value="" selected disabled>select your Property
                                type</option>
                            <option @selected(Request::input('propertyType') == 'house') value="house">houses</option>
                            <option @selected(Request::input('propertyType') == 'apartment') value="apartment">apartment</option>
                            <option @selected(Request::input('propertyType') == 'commercial') value="commercial">commercial</option>
                            <option @selected(Request::input('propertyType') == 'hut') value="hut">hut</option>
                            <option @selected(Request::input('propertyType') == 'caravan') value="caravan">caravan</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <h4>details:</h4>
                    <label for="">Rooms</label>
                    <input name="rooms" value="{{ Request::input('rooms') }}" class="border-gray-300 rounded-md"
                        type="text" placeholder="rooms">
                </div>
                <button class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl text-white">Search</button>
            </form>
        </div>

        <div class="py-4 px-5 w-[75%] ms-[25%]">
            <div class="flex flex-col justify-center items-start gap-3 mb-4 ">
                <div>
                    <p class="m-0 text-gray-600 font-bold">Showing {{ count($properties) }} results</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                @foreach ($properties as $property)
                    <div class="rounded-xl border shadow-md px-1">
                        @include('property.components.property_carousel')
                        <div class="px-2 py-3 flex justify-between items-center">
                            <div>
                                <p class="m-0 text-[1rem] font-thin ">{{ $property->propertyTitle }}
                                </p>

                                <p class="m-0 text-[1rem] font-thin">rooms: {{ $property->rooms }}
                                </p>
                                <p class="m-0 text-[1rem] font-thin">type: {{ $property->propertyType }}
                                </p>
                                <p class="m-0 text-[1rem] font-thin">location: {{ $property->location }}
                                </p>

                                <p class="font-black m-0 text-[0.8rem]">{{ $property->price }}DH <span
                                        class="text-[0.6rem] font-extralight">(per houre)</span></p>
                            </div>
                            <div>
                                <a href="{{ route('properties.show', $property) }}"
                                    class="border border-black px-[1rem] py-[0.1rem] rounded-2xl no-underline text-black">book</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>

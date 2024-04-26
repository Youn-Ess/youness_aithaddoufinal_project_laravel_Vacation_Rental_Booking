<x-app-layout>
    <div class="p-20 flex justify-center gap-5">
        <div class="flex flex-col justify-center items-center w-[25vw] h-[30%] p-5 shadow-xl bg-white rounded-2xl">
            <div class="w-[6vw] pb-3">
                <img class="rounded-full" src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
            </div>
            <h2 class="m-0 text-center">{{ Auth::user()->name }}</h2>
            <h4>{{ Auth::user()->roles[0]->name }}</h4>
            <p class="m-0 text-center">{{ Auth::user()->gender }}</p>
            <p class="m-0 text-center"><span class="font-bold">from:</span> {{ Auth::user()->city }}</p>
            <p class="m-0 text-center"><span class="font-bold">contact me:</span> {{ Auth::user()->email }}</p>
            <p class="">@include('cart.components.cart')</p>

        </div>
        <div class="w-[75vw]">
            @role('owner')
                <div class="flex justify-start items-center gap-5 mb-5 ">
                    <div>
                        <h3 class="m-0">My Properties:</h3>
                    </div>
                    <div class="flex h-[5.5vh] gap-2">
                        <input type="text" class="border-gray-300 rounded-2xl" placeholder="search">
                        <button class="bg-myPrimary px-[1rem] rounded-2xl text-white">Search</button>
                    </div>
                </div>
                <div class=" flex flex-wrap gap-4">
                    @foreach (Auth::user()->properties as $property)
                        <div class="rounded-xl border shadow-md px-2">
                            <div class="flex justify-end px-2">
                                <button class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <p class="m-0 text-[1.3rem]">...</p>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form action="{{ route('properties.destroy', $property) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger w-full">delete</button>
                                        </form>
                                    </li>
                                    <li class="mt-1">
                                        <form action="{{ route('properties.edit', $property) }}" method="post">
                                            @csrf
                                            <button class="btn btn-primary w-full">edit</button>
                                        </form>
                                    </li>
                                    <li class="mt-1">
                                        <a href="{{ route('calendar.show', $property) }}"
                                            class="btn btn-primary w-full">view callendar</a>
                                    </li>
                                </ul>
                            </div>
                            <img width="260" height="300" class="rounded-xl"
                                src="{{ asset('storage/' . $property->propertyImages[0]->image_path) }}" alt="">
                            <div class="px-2 py-3 flex justify-between items-center">
                                <div>
                                    <p class="m-0 text-[1rem] font-thin">{{ $property->propertyTitle }} title title</p>
                                    <p class="font-black m-0 text-[0.8rem]">{{ $property->price }}DH <span
                                            class="text-[0.6rem] font-extralight">(per houre)</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endrole
        </div>
    </div>
</x-app-layout>

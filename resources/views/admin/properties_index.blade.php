<x-app-layout>
    <div class="grid grid-cols-3 gap-4 ">
        @if (count($properties) > 0)
            @foreach ($properties as $property)
                <div class="rounded-xl border shadow-md px-2">
                    <div class="flex justify-end px-2">
                        <button class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <p class="m-0 text-[1.3rem]">...</p>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('admin.properties_destroy', $property) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger w-full">delete</button>
                                </form>
                            </li>
                            <li class="mt-1">
                                <a href="{{ route('admin.properties_edit', $property) }}"
                                    class="btn btn-primary w-full">edit</a>
                            </li>
                            <li class="mt-1">
                                <a href="{{ route('admin.calendar_show', $property) }}"
                                    class="btn btn-primary w-full">view
                                    callendar</a>
                            </li>
                        </ul>
                    </div>
                    @include('property.components.property_carousel')
                    <div class="px-2 py-3 flex justify-between items-center">
                        <div>
                            <p class="m-0 text-[1rem] font-thin">{{ $property->propertyTitle }}</p>
                            <p class="font-black m-0 text-[0.8rem]">{{ $property->price }}DH <span
                                    class="text-[0.6rem] font-extralight">(per houre)</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5>you have no properties to list</h5>
        @endif
    </div>
</x-app-layout>

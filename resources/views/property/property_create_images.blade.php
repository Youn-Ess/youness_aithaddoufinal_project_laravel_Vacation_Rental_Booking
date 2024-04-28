<x-app-layout>

    <div class="flex justify-center">
        <form action="{{ route('properties.storeImage') }}" method="post" class="flex flex-col gap-3 w-[30%] pt-10"
            enctype="multipart/form-data">
            @csrf
            <h4>add images for your property</h4>
            <input type="number" name="property_id" value="{{ $property_id }}" class="d-none">
            <div class="flex flex-col gap-1">
                <label for="">Add Images:</label>
                <input class="border-gray-300 rounded-md border p-3" type="file" name="images[]" multiple>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <button class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl text-white w-[30%]">add property</button>
        </form>
    </div>
</x-app-layout>

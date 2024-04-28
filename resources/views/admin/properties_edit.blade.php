<x-app-layout>
    <section class="flex justify-center pt-10 ">
        <form action="{{ route('admin.properties_update', $property) }}" method="post"
            class="bg-white w-[30%] flex flex-col gap-3 p-4 rounded-lg">
            @method('PUT')
            @csrf
            <h3>Edit property</h3>
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1">
                    <label for="">propertyTitle</label>
                    <input value="{{ $property->propertyTitle }}" name="propertyTitle" class="border-gray-300 rounded-md"
                        type="text" placeholder="propertyTitle">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Type</label>
                    <select class="border-gray-300 rounded-md" name="propertyType" id="">
                        <option value="" selected disabled>select your Property type
                        </option>
                        <option @selected($property->propertyType == 'house') value="house">houses</option>
                        <option @selected($property->propertyType == 'apartment') value="apartment">apartment</option>
                        <option @selected($property->propertyType == 'commercial') value="commercial">commercial</option>
                        <option @selected($property->propertyType == 'hut') value="hut">hut</option>
                        <option @selected($property->propertyType == 'caravan') value="caravan">caravan</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Description</label>
                    <input value="{{ $property->propertyDescription }}" name="propertyDescription"
                        class="border-gray-300 rounded-md" type="text" placeholder="description">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Number of rooms</label>
                    <input value="{{ $property->rooms }}" name="rooms" class="border-gray-300 rounded-md"
                        type="number" placeholder="rooms">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Location Link (from google maps)</label>
                    <input value="{{ $property->location }}" name="location" class="border-gray-300 rounded-md"
                        type="text" placeholder="Location">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Price per hour (DH)</label>
                    <input value="{{ $property->price }}" name="price" class="border-gray-300 rounded-md"
                        type="number" min="1" max="100" placeholder="price">
                </div>
            </div>
            <button class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl text-white">edit property</button>
        </form>
    </section>

</x-app-layout>

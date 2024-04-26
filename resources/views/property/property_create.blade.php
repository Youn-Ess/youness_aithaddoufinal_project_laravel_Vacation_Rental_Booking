<x-app-layout>
    <section class="flex justify-center pt-10 ">
        <form action="{{ route('properties.store') }}" method="post"
            class="bg-white w-[30%] flex flex-col gap-3 p-4 rounded-lg">
            @csrf
            <h3>List property</h3>
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1">
                    <label for="">propertyTitle</label>
                    <input name="propertyTitle" class="border-gray-300 rounded-md" type="text"
                        placeholder="propertyTitle">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Type</label>
                    <select class="border-gray-300 rounded-md" name="propertyType" id="">
                        <option value="" selected disabled>select your Property type</option>
                        <option value="house">houses</option>
                        <option value="apartment">apartment</option>
                        <option value="commercial">commercial</option>
                        <option value="hut">hut</option>
                        <option value="caravan">caravan</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Description</label>
                    <input name="propertyDescription" class="border-gray-300 rounded-md" type="text"
                        placeholder="description">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Number of rooms</label>
                    <input name="rooms" class="border-gray-300 rounded-md" type="number" placeholder="rooms">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Location Link (from google maps)</label>
                    <input name="location" class="border-gray-300 rounded-md" type="text" placeholder="Location">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Price per hour (DH)</label>
                    <input name="price" class="border-gray-300 rounded-md" type="number" min="1" max="100" placeholder="price">
                </div>
            </div>
            <button class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl text-white">add property</button>
        </form>
    </section>

</x-app-layout>

{{-- <!-- Button trigger modal -->
<button type="button" id="calendarModal" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#calendarModal">
    modal
</button>

<!-- Modal -->
<div class="modal fade" id="calendarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="calendarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="calendarModalLabel">Rent Property</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendar.store') }}" method="post"
                    class="bg-white  flex flex-col gap-3 p-4 rounded-lg">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-1">
                            <p class="font-bold text-[1.2rem] m-0">property title: <span
                                    class="font-light text-[0.9rem]">{{ $property->propertyTitle }}</span></p>
                            <p class="font-bold text-[1.2rem] m-0">property type: <span
                                    class="font-light text-[0.9rem]">{{ $property->propertyType }}</span></p>

                            <p class="font-bold text-[1.2rem] m-0">property location: <span
                                    class="font-light text-[0.9rem]">{{ $property->location }}</span></p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="">property price per hour</label>
                            <input class="border-gray-300 rounded-md" id="pricePerHour" value="{{ $property->price }}"
                                type="number" readonly>
                        </div>
                        <input type="number" id="property_id" name="property_id" value="{{ $property->id }}" class="d-none" readonly>
                        <div class="flex flex-col gap-1">
                            <label for="">check id date</label>
                            <input name="check_id_date" step="3600" id="check_in_date"
                                class="border-gray-300 rounded-md" step="3600" type="datetime-local"
                                placeholder="check_id_date">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">check out date</label>
                            <input name="check_out_date" id="check_out_date" step="3600"
                                class="border-gray-300 rounded-md" type="datetime-local" placeholder="check_out_date">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">total hours</label>
                            <input class="border-gray-300 rounded-md" name="total_hours" id="totalHours" type="number" readonly>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">total price (DH)</label>
                            <input class="border-gray-300 rounded-md" name="total_price" id="totalPrice" type="number" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-gray-600 px-[1rem] py-[0.4rem] rounded-2xl text-white"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit"
                            class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl text-white">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="calendarModal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendar.store') }}" method="post"
                    class="bg-white  flex flex-col gap-3 p-4 rounded-lg">
                    @csrf
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-1">
                            <p class="font-bold text-[1.2rem] m-0">property title: <span
                                    class="font-light text-[0.9rem]">{{ $property->propertyTitle }}</span></p>
                            <p class="font-bold text-[1.2rem] m-0">property type: <span
                                    class="font-light text-[0.9rem]">{{ $property->propertyType }}</span></p>

                            <p class="font-bold text-[1.2rem] m-0">property location: <span
                                    class="font-light text-[0.9rem]">{{ $property->location }}</span></p>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="">property price per hour</label>
                            <input class="border-gray-300 rounded-md" id="pricePerHour" value="{{ $property->price }}"
                                type="number" readonly>
                        </div>
                        <input type="number" id="property_id" name="property_id" value="{{ $property->id }}"
                            class="d-none" readonly>
                        <div class="flex flex-col gap-1">
                            <label for="">check id date</label>
                            <input name="check_id_date" step="3600" id="check_in_date"
                                class="border-gray-300 rounded-md" step="3600" type="datetime-local"
                                placeholder="check_id_date">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">check out date</label>
                            <input name="check_out_date" id="check_out_date" step="3600"
                                class="border-gray-300 rounded-md" type="datetime-local" placeholder="check_out_date">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">total hours</label>
                            <input class="border-gray-300 rounded-md" name="total_hours" id="totalHours" type="number"
                                readonly>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="">total price (DH)</label>
                            <input class="border-gray-300 rounded-md" name="total_price" id="totalPrice" type="number"
                                readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-gray-600 px-[1rem] py-[0.4rem] rounded-2xl text-white"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit"
                            class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl text-white">submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

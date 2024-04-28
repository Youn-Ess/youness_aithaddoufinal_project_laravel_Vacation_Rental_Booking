<!-- Button trigger modal -->
<a type="button" class="text-[1.2rem] no-underline border border-black rounded-xl p-1 text-black hover:underline "
    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    my cart
</a>

<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Vacation Rentals</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (count($userCartProperties) != 0)
                <div class="modal-body">
                    <div class="flex justify-between">
                        <h5>Properties:</h5>
                        <p>Cost:</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        @foreach ($userCartProperties as $event)
                            <div class="flex justify-between border-t-2 p-2">
                                <div class="flex gap-2">
                                    <img class="w-[35%] rounded-lg"
                                        src="{{ asset('storage/' . $event->property->propertyImages[0]->image_path) }}"
                                        alt="">
                                    <div class="p-3">
                                        <h5>{{ $event->property->propertyTitle }}</h5>
                                    </div>
                                </div>
                                <div class="w-[25vw]">
                                    <p>price: {{ $event->total_price }}DH</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-between border-t-2 p-2">
                        <h4>Total Price :</h4>
                        <p>{{ $totalPrice }}DH</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-gray-500 px-[1rem] py-[0.4rem] rounded-2xl no-underline text-white"
                        data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('cart.index') }}"
                        class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl no-underline text-white">Proceed
                        to Payment</a>
                </div>
            @else
                <div class="modal-body">
                    <h3>you have no renting</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-gray-500 px-[1rem] py-[0.4rem] rounded-2xl no-underline text-white"
                        data-bs-dismiss="modal">Close</button>
                </div>
            @endif
        </div>
    </div>
</div>

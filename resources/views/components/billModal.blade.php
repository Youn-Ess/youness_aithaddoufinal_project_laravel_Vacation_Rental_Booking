@props(['bill'])
<!-- Button trigger modal -->
<button type="button" class="text-black px-4 py-2 bg-secondary-color rounded-full" data-bs-toggle="modal" data-bs-target="#e{{ $bill->id }}">
    Pay
</button>

<!-- Modal -->
<div class="modal fade" id="e{{ $bill->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bill.pay') }}" method="post" class="text-black">
                    @csrf
                    <h3 class="font-thin">Select your card number</h3>
                    <div class="flex flex-col">
                        <select name="card_selected" id="" class="rounded-full">
                            @foreach ($userCards as $card)
                                <option value="{{ $card->id }}">card id:{{ $card->card_number }} ,balance:
                                    {{ $card->balance }}
                                </option>
                            @endforeach
                        </select>
                        @error('card_selected')
                            <span class="text-red-500">{{ $message }} </span>
                        @enderror
                        <div class="flex flex-col">
                            <label for="" class="px-2 py-1">Title</label>
                            <input class="rounded-full" type="text" name="service_name" readonly value="{{ $bill->title }}">
                        </div>
                        <div class="flex flex-col">
                            <label for="" class="px-2 py-1">Price</label>
                            <input class="rounded-full" type="number" name="price" readonly value="{{ $bill->price }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="text-white px-4 py-2 bg-primary-color rounded-full" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="text-black px-4 py-2 bg-secondary-color rounded-full">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

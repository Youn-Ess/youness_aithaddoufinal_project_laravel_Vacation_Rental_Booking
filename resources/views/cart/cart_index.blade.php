<x-app-layout>
    <div class="flex justify-center pt-[2rem] ">
        <div class="w-[60%] border shadow-md bg-[#e2e3e5] px-[1rem] py-[2rem] rounded-lg">
            <h1>Shopping Cart</h1>
            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">Rental</th>
                        <th scope="col">Check-in</th>
                        <th scope="col">Check-out</th>
                        <th scope="col">Hours</th>
                        <th scope="col">Price (H)</th>
                        <th scope="col">Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th scope="row" class="w-[30%]">
                                <div class="flex gap-2">
                                    <img class="w-[70%]"
                                        src="{{ asset('storage/' . $event->property->propertyImages[0]->image_path) }}"
                                        alt="">
                                    <div class="px-3">
                                        <h5> {{ $event->property->propertyTitle }}</h5>
                                    </div>
                                </div>
                            </th>
                            <td>{{ $event->check_id_date }}</td>
                            <td>{{ $event->check_out_date }}</td>
                            <td>{{ $event->total_hours }}</td>
                            <td>{{ $event->property->price }}DH</td>
                            <td>{{ $event->total_price }}DH</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('stripe.session') }}" method="get" class="flex justify-end pe-10">
                <button class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl no-underline text-white ">Proceed to
                    Payment</button>
            </form>
        </div>

    </div>
</x-app-layout>

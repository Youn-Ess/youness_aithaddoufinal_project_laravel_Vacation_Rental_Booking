<x-app-layout>

    <div class="p-7">
        <h3 class="font-lato_bold">Users:</h3>

        <div class="grid lg:grid-cols-4 grid-cols-1 gap-4">
            @foreach ($users as $user)
                @include('admin.components.userCard')
            @endforeach
        </div>
    </div>
</x-app-layout>

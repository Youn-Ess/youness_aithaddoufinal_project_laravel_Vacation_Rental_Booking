<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="admin_update_modal" data-bs-toggle="modal" data-bs-target="#1admin_update_modal">

</button>

<!-- Modal -->
<div class="modal fade" id="1admin_update_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="1admin_update_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="1admin_update_modalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.update_calendar') }}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="eventId" id="eventId">
                    <p>Event ID: {{ old('eventId') }}</p>
                    <div class="flex flex-col gap-1">
                        <label for="">check id date</label>
                        <input name="check_id_date" step="3600" id="check_in_date_in_update"
                            class="border-gray-300 rounded-md" step="3600" type="datetime-local"
                            placeholder="check_id_date">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="">check out date</label>
                        <input name="check_out_date" id="check_out_date_in_update" step="3600"
                            class="border-gray-300 rounded-md" type="datetime-local" placeholder="check_out_date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-gray-600 px-[1rem] py-[0.4rem] rounded-2xl text-white"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit"
                            class="bg-blue-600 px-[1rem] py-[0.4rem] rounded-2xl text-white">update</button>
                    </div>
                </form>
                {{-- <form action="{{ route('calendar.delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="eventId2" id="eventId2">
                    <button type="submit"
                        class="bg-myPrimary px-[1rem] py-[0.4rem] rounded-2xl text-white">delete</button>
                </form> --}}
            </div>
        </div>
    </div>
</div>

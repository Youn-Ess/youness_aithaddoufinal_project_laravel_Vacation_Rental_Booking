<x-app-layout>

    <div class="bg-gray-100  h-[89vh] flex flex-col-reverse gap-y-9 items-center justify-center ">
        <div class="w-[60%] bg-white  rounded-3xl border-none p-3 h-[65vh]" id="calendar"></div>
        @include('admin.admin_calendar_modal')
        @include('admin.admin_calendar_modal_update')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {

            const calendarData = @json($calendarData);
            const events = calendarData.original.events

            console.log(events);
            var myCalendar = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(myCalendar, {
                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                    right: 'listMonth,listWeek,listDay'
                },

                views: {
                    listDay: { // Customize the name for listDay
                        buttonText: 'Day Events',
                    },
                    listWeek: { // Customize the name for listWeek
                        buttonText: 'Week Events'
                    },
                    listMonth: { // Customize the name for listMonth
                        buttonText: 'Month Events'
                    },
                    timeGridWeek: {
                        buttonText: 'Week', // Customize the button text
                    },
                    timeGridDay: {
                        buttonText: "Day",
                    },
                    dayGridMonth: {
                        buttonText: "Month",
                    },
                },


                initialView: "timeGridWeek",
                nowIndicator: true,
                selectable: true,
                selectMirror: true,
                selectOverlap: false,
                weekends: true,
                slotDuration: '01:00:00',

                events: events,
                // eventContent: function(info) {
                //     console.log(info.event.start);
                //     return `
            //     ${info.event.start}
            //     ${info.event.title}
            //     ${info.event.description}
            //     `   
                // },

                selectAllow: (info) => {
                    let instant = new Date()
                    return info.start > instant
                },

                select: (info) => {
                    let start = info.start
                    let end = info.end

                    document.getElementById('check_in_date').value = formatDate(start)


                    document.getElementById('check_out_date').value = formatDate(end)
                    let date = new Date();
                    date.setHours(date.getHours() + 1)
                    date = formatDate(date)


                    document.getElementById('check_in_date').min = date
                    let milliseconds = end - start
                    let hours = milliseconds / 60 / 60 / 1000

                    document.getElementById('totalHours').value = hours
                    let price = document.getElementById('pricePerHour').value

                    document.getElementById('totalPrice').value = hours * +price

                    document.getElementById('admin_calendar_modal').click()

                },

                eventClick: (info) => {
                    let id = info.event.id
                    let start = info.event.start
                    let end = info.event.end
                    document.getElementById('check_in_date_in_update').value = formatDate(
                        start)
                    document.getElementById('check_out_date_in_update').value = formatDate(
                        end)
                    const inputId = document.getElementById('eventId')
                    const inputId2 = document.getElementById('eventId2')
                    inputId.value = id
                    document.getElementById('admin_update_modal').click()
                },
            });

            function formatDate(date) {
                date.setHours(date.getHours() + 1)
                date.setMinutes(0);
                date.setSeconds(0);
                const formattedDate = date.toISOString().slice(0, 16)
                return formattedDate
            }

            // function updateEvent(eventId, newStart, newEnd) {
            //     $.ajax({
            //         url: `/calendar/update/${eventId}`,
            //         method: 'POST',
            //         data: {
            //             start: newStart,
            //             end: newEnd,
            //         },
            //         success: function(response) {
            //             console.log(response.message); // Log the success message
            //             // Update the calendar with the updated event (optional)
            //         },
            //         error: function(error) {
            //             console.error('Error updating event:', error);
            //             // Handle potential errors
            //         }
            //     });
            // }

            calendar.render()

        });
    </script>

    @vite('resources/css/app.css')
</x-app-layout>

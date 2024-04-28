<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cart;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'property_id' => 'required',
            'total_price' => 'required',
            'total_hours' => 'required',
            'check_out_date' => 'required',
            'check_id_date' => 'required',
        ]);

        $book = Booking::create([
            'user_id' => Auth::user()->id,
            'property_id' => $request->property_id,
            'total_price' => $request->total_price,
            'total_hours' => $request->total_hours,
            'check_id_date' => $request->check_id_date,
            'check_out_date' => $request->check_out_date,
        ]);

        return back()->with('success', 'events stored from admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {

        // Gate::authorize('auth_user_can_rent', $property->user->id);

        $events = Booking::where('property_id',  $property->id)->get();

        $events = $events->map(function ($event) {
            $authUser = User::where('id', auth()->user()->id)->first();

            return [
                'id' => $event->id,
                'user_id' => $event->user->id,
                'role' => $authUser->getRoleNames()[0],
                // !hadi wahed l3ayba jdida
                // ...$event->toArray(),
                'start' => $event->check_id_date,
                'end' => $event->check_out_date,
                'title' => $event->property->propertyTitle,
                'color' => Auth::user()->id == $event->user->id ? '#689f38' : '#FF5733',
            ];
        });

        $calendarData = response()->json([
            "events" => $events
        ]);

        return view('calendar.calendar', compact('property', 'calendarData'));
    }



    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $events = Booking::all();
        $event = Booking::where('id', $request->eventId)->first();

        foreach ($events as $myEvent) {
            if ($request->ckeck_in_date <= $myEvent->check_id_date || $request->check_out_date) {
            }
        }

        $event->check_id_date = $request->check_id_date;
        $event->check_out_date = $request->check_out_date;

        $event->save();

        return back()->with('success', 'wa 3la slamtk shtina htal 5 dsba7');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $event = Booking::where('id', $request->eventId2)->first();
        $event->delete();
        return back()->with('success', 'success');
    }
}

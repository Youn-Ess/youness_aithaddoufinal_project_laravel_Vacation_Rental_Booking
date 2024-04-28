<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //

    public function index()
    {
        $users = User::all()->where('id', '!=', Auth::user()->id);
        return view('admin.admin', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'city' => $request->city,
        ]);

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($user->image) && $user->image != 'profileImages/defaultProfileImage.png') {
                Storage::disk('public')->delete($user->image);
            }

            $imageName = time() . $request->file('image')->getClientOriginalName();
            $user['image'] = $request->file('image')->storeAs('profileImages', $imageName, 'public');
            $user->save();
        }

        return redirect()->route('admin.index')->with('success', 'user updated successfully');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'user deleted successfully');
    }

    public function properties_index(string $id)
    {
        $properties = Property::all()->where('user_id', '==', $id);

        return view('admin.properties_index', compact('properties'));
    }

    public function properties_edit(Property $property)
    {
        return view('admin.properties_edit', compact('property'));
    }

    public function properties_update(Request $request, Property $property)
    {
        request()->validate([
            'propertyTitle' => 'required',
            'propertyType' => 'required',
            'propertyDescription' => 'required',
            'rooms' => 'required',
            'location' => 'required',
            'price' => 'required',
        ]);

        $property->update([
            'propertyTitle' => $request->propertyTitle,
            'propertyType' => $request->propertyType,
            'propertyDescription' => $request->propertyDescription,
            'rooms' => $request->rooms,
            'location' => $request->location,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.index')->with('success', 'property updated successfully');
    }

    public function calendar_show(Property $property)
    {
        $events = Booking::where('property_id',  $property->id)->get();

        $events = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'user_id' => $event->user_id,
                // !hadi wahed l3ayba jdida
                // ...$event->toArray(),
                'start' => $event->check_id_date,
                'end' => $event->check_out_date,
                'title' => $event->property->propertyTitle,
                'color' => '#689f38',
            ];
        });

        $calendarData = response()->json([
            "events" => $events
        ]);

        return view('admin.admin_calendar', compact('property', 'calendarData'));
    }


    public function store_calendar(Request $request)
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
    public function update_calendar(Request $request)
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

        return back()->with('success', 'event updated from admin');
    }
}

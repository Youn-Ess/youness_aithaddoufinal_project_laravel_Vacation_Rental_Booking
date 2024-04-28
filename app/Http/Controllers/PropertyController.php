<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $propertiesQuery = Property::query();

        $name = ($request->input('name'));
        $minbudget = ($request->input('minBudget'));
        $maxbudget = ($request->input('maxBudget'));
        $location = ($request->input('location'));
        $rooms = ($request->input('rooms'));

        if (!empty($name)) {
            $propertiesQuery->where('propertyTitle', 'like', "%{$name}%");
        }
        // $properties = $propertiesQuery->get();

        if (!empty($minbudget)) {
            $propertiesQuery->where('price', '>=', "{$minbudget}");
        }
        if (!empty($maxbudget)) {
            $propertiesQuery->where('price', '<=', "{$maxbudget}");
        }

        if (!empty($location)) {
            $propertiesQuery->where('location', '=', "{$location}");
        }
        if (!empty($rooms)) {
            $propertiesQuery->where('rooms', '=', "{$rooms}");
        }
        $properties = $propertiesQuery->get();


        return view('property.property_index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('property.property_create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'propertyTitle' => 'required',
            'propertyType' => 'required',
            'propertyDescription' => 'required',
            'rooms' => 'required',
            'location' => 'required',
            'price' => 'required',
        ]);

        $property = Property::create([
            'user_id' => auth()->user()->id,
            'propertyTitle' => $request->propertyTitle,
            'propertyType' => $request->propertyType,
            'propertyDescription' => $request->propertyDescription,
            'rooms' => $request->rooms,
            'location' => $request->location,
            'price' => $request->price,
        ]);

        $property_id = $property->id;

        return redirect()->route('properties.createImage', ['property_id' => $property_id]);
    }

    public function createImage(string $property_id)
    {
        return view('property.property_create_images', compact('property_id'));
    }


    public function storeImage(Request $request)
    {
        request()->validate([
            'property_id' => 'required',
            'images' => 'required|array|min:1|max:5', // New validation rule
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . $image->getClientOriginalName();
                PropertyImage::create([
                    'property_id' => $request->property_id,
                    'image_path' => $image->storeAs('propertyImages', $imageName, 'public'),
                ]);
            }
        }

        return redirect()->route('properties.index')
            ->with('success', 'Images uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('property.property_show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('property.property_edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
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

        return redirect()->route('profile.index')->with('success', 'property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return back()->with('success', 'property was deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();

        // $locations = Venue::query()->distinct('location')->get();

        return view('venue/index', ['venues' => $venues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venue/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:venues,name',
            'contact_person_name' => 'max:255',
            'phone_number' => 'required|unique:venues,phone_number',
            'email' => 'required|email|max:255',
            'image' => 'mimes:jpg,png,jpeg,gif',
            'facebook_link' => 'max: 255',
            'instagram_link' => 'max:255',
            'available' => 'required|boolean'
        ]);



        $venue = new Venue();
        $venue->fill($request->all());
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $venue->image = $image;
        }

        $venue->available = $this->toBoolean($request->available);
        $venue->save();

        return redirect()->route('venues.index')->with('message', 'Venue added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venue = Venue::find($id);

        if (!$venue) {
            abort(404);
        }

        return view('venue.show', ['venue' => $venue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $venue = Venue::find($id);

        if (!$venue) {
            abort(404);
        }

        return view('venue.edit', ['venue' => $venue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venue = Venue::find($id);

        $request->validate([
            'name' => 'required',
            'contact_person_name' => 'max:255',
            'phone_number' => 'required',
            'email' => 'required|email|max:255',
            'image' => 'image|mimes:jpg,png,jpeg,gif',
            'facebook_link' => 'max: 255',
            'instagram_link' => 'max:255',
        ]);


        $venue->fill($request->all());
        $image = $venue->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $venue->image = $image;
        }

        $venue->available = $this->toBoolean($request->available);
        $venue->save();

        return redirect('/venues')->with([
            'message' => 'Venue updated successfully!',
            'venue' => $venue
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = Venue::find($id);

        if (!$venue) {
            abort(404);
        }

        $venue->delete();
    }


    public function toBoolean($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}

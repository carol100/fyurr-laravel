<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artist.index', ['artists' => Artist::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artist.create');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'stage_name' => 'max:255',
            'phone_number' => 'required|min:10|max:10|unique:artists,phone_number',
            'email' => 'email|max:255|unique:artists,email',
            'image' => 'mimes:jpg,png',
            'address' => 'max:255',
            'facebook_link' => 'max:255',
            'instagram_link' => 'max:255',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        $artist = new Artist();
        $artist->fill($request->all());
        $artist->image = $image;

        if ($request->genres) {
            $genres = implode(',', $request->genres);
            $artist->genres = $genres;
        }

        $artist->available = $this->toBoolean($request->available);
        $artist->save();

        return redirect()->route('artists.create')->with('message', 'Artist added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);

        // $artist = array([
        //     'id' => $artist->id,
        //     'first_name' => $artist->first_name,
        //     'last_name' => $artist->last_name,
        //     'stage_name' => $artist->stage_name,
        //     'phone_number' => $artist->phone_number,
        //     'email' => $artist->email,
        //     'address' => $artist->address,
        //     'image' => $artist->image,
        //     'genres' => explode(',', $artist->image),
        //     'facebook_link' => $artist->facebook_link,
        //     'instagram_link' => $artist->instagram_link,
        //     'available' => $artist->available,
        // ]);

        $genres = explode(',', $artist->genres);

        return view('artist.show', ['artist' => $artist, 'genres' => $genres]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::find($id);

        $genres = [];
        if ($artist->genres) {
            $genres = explode(',', $artist->genres);
        }

        return view('artist.edit', ['artist' => $artist, 'genres' => $genres]);
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
        $artist = Artist::find($id);

        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'stage_name' => 'max:255',
            'phone_number' => ['required', 'min:10', 'max:10', Rule::unique('artists')->ignore($artist)],
            'email' => ['email', 'max:255', Rule::unique('artists')->ignore($artist)],
            'image' => 'mimes:jpg,png',
            'address' => 'max:255',
            'facebook_link' => 'max:255',
            'instagram_link' => 'max:255',
        ]);


        $image = $artist->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }


        $artist->fill($request->all());
        $artist->image = $image;

        if ($request->genres) {
            $genres = implode(',', $request->genres);
            $artist->genres = $genres;
        }

        $artist->available = $this->toBoolean($request->available);
        $artist->save();

        return redirect()->route('artists.edit', ['artist' => $artist->id])->with('message', 'Artist updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toBoolean($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}

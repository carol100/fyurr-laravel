<?php

namespace App\Http\Controllers\Web;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistRequest;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (array_key_exists('search_term', $request->query())) {
            $search_term = $request->query('search_term');

            $artists = Artist::where('first_name', 'like', '%' . $search_term . '%')
                ->orWhere('last_name', 'like', '%' . $search_term . '%')
                ->orWhere('stage_name', 'like', '%' . $search_term . '%')
                ->get();
    
            return view('artist.search', ['artists' => $artists]);
        }
        
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
    public function store(ArtistRequest $request)
    {
        $request->validated();

        $artist = new Artist();
        $artist->fill($request->except(['_token', 'genres', 'image']));
        
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $artist->image = $image;
        }

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
    public function show(Artist $artist)
    {
        return view('artist.show', ['artist' => $artist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('artist.edit', ['artist' => $artist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistRequest $request, Artist $artist)
    {
        $request->validated();

        $artist->fill($request->except(['_token', 'genres', 'image']));

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $artist->image = $image;
        }

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
}

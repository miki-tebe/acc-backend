<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Location::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\App\Models\Location $location
     */
    public function store(Request $request)
    {
        $request->validate([]);

        $location = Location::create($request->all());

        return $location;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\App\Models\Location $location
     */
    public function show($id)
    {
        $location = Location::find($id);
        if (! $location) {
            return response(['error' => 1, 'message' => 'Location doesn\'t exist'], 404);
        }

        return $location;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|Location
     */
    public function update(Request $request, $id)
    {
        $location = Location::find($id);
        if (! $location) {
            return response(['error' => 1, 'message' => 'Location doesn\'t exist'], 404);
        }

        $location->update($request->all());

        return $location;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        if (! $location) {
            return response(['error' => 1, 'message' => 'Location doesn\'t exist'], 404);
        }

        return $location->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Region::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\App\Models\Region $region
     */
    public function store(Request $request)
    {
        $request->validate([]);

        $region = Region::create($request->all());

        return $region;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\App\Models\Region $region
     */
    public function show($id)
    {
        $region = Region::find($id);
        if (! $region) {
            return response(['error' => 1, 'message' => 'Region doesn\'t exist'], 404);
        }

        return $region;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|Region
     */
    public function update(Request $request, $id)
    {
        $region = Region::find($id);
        if (! $region) {
            return response(['error' => 1, 'message' => 'Region doesn\'t exist'], 404);
        }

        $region->update($request->all());

        return $region;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);
        if (! $region) {
            return response(['error' => 1, 'message' => 'Region doesn\'t exist'], 404);
        }

        return $region->delete();
    }
}

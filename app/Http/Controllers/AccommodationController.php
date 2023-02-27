<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Accommodation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\App\Models\Accommodation $accommodation
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'summary' => 'required|string',
        ]);

        $accommodation = Accommodation::create($request->all());

        return $accommodation;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\App\Models\Accommodation $accommodation
     */
    public function show($id)
    {
        $accommodation = Accommodation::find($id);
        if (!$accommodation) {
            return response(['error' => 1, 'message' => 'Accommodation doesn\'t exist'], 404);
        }

        return $accommodation;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|Accommodation
     */
    public function update(Request $request, $id)
    {
        $accommodation = Accommodation::find($id);
        if (!$accommodation) {
            return response(['error' => 1, 'message' => 'Accommodation doesn\'t exist'], 404);
        }

        $accommodation->update($request->all());

        return $accommodation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accommodation = Accommodation::find($id);
        if (!$accommodation) {
            return response(['error' => 1, 'message' => 'Accommodation doesn\'t exist'], 404);
        }

        return $accommodation->delete();
    }
}

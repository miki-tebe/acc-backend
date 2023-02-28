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
            'user_id' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id',
            'region_id' => 'required|exists:regions,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'summary' => 'required|string',
            'category' => 'nullable|string',
            'price' => 'nullable|numeric',
            'i_price' => 'nullable|numeric',
            'currency' => 'nullable|string',
            'published' => 'nullable|boolean',
            'fully_booked' => 'nullable|boolean',
            'discount' => 'nullable|numeric',
            'status' => 'nullable|string',
            'tags' => 'nullable|array',
            'commission' => 'nullable|numeric',
            'accommodation_images' => 'nullable|array',
            'accommodation_pictures' => 'nullable|string',
            'average_rating' => 'nullable|integer',
            'total_reviews' => 'nullable|integer',
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

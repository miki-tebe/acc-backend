<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Room::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\App\Models\Room $room
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'room_price' => 'required|numeric',
            'room_i_price' => 'nullable|numeric',
            'room_discount' => 'nullable|numeric',
            'available_room' => 'nullable|integer',
            'sharable' => 'nullable|boolean',
            'room_image' => 'nullable|string',
            'room_images' => 'nullable|array',
        ]);

        $room = Room::create($request->all());

        return $room;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\App\Models\Room $room
     */
    public function show($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response(['error' => 1, 'message' => 'Room doesn\'t exist'], 404);
        }

        return $room;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|Room
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response(['error' => 1, 'message' => 'Room doesn\'t exist'], 404);
        }

        $room->update($request->all());

        return $room;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response(['error' => 1, 'message' => 'Room doesn\'t exist'], 404);
        }

        return $room->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reservation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\App\Models\Reservation $reservation
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'accommodation_id' => 'required|exists:accommodations,id',
            'status' => 'nullable|string',
            'currency' => 'required|string',
            'checked_in' => 'required|date',
            'checked_out' => 'required|date',
            'payment_type' => 'nullable|string',
            'price' => 'required|numeric',
            'canceled_reason' => 'nullable|string',
            'commission' => 'nullable|numeric',
            'source' => 'nullable|string',
            'booking_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'room_size' => 'nullable|integer',
            'adults' => 'nullable|integer',
            'children' => 'nullable|integer',
            'code' => 'nullable|string',
            'total_price' => 'nullable|numeric',
            'total_stay' => 'nullable|integer',
        ]);

        $reservation = Reservation::create($request->all());

        return $reservation;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\App\Models\Reservation $reservation
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return response(['error' => 1, 'message' => 'Reservation doesn\'t exist'], 404);
        }

        return $reservation;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|Reservation
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return response(['error' => 1, 'message' => 'Reservation doesn\'t exist'], 404);
        }

        $reservation->update($request->all());

        return $reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return response(['error' => 1, 'message' => 'Reservation doesn\'t exist'], 404);
        }

        return $reservation->delete();
    }
}

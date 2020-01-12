<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Booking;
use App\Http\Resources\Booking as BookingResource;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Booking
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(5);

        // Return collection of bookings as resource
        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = $request->isMethod('put') ? Booking::findOrFail($request->input('booking_id')) : new Booking;
        
        $booking->id = $request->input('booking_id');
        $booking->name = $request->input('name');
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');
        $booking->message = $request->input('message');

        if($booking->save()) {
            return new BookingResource($booking);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get booking
        $booking = Booking::findOrFail($id);

        // Return booking as a resource
        return new BookingResource($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get booking
        $booking = Booking::findOrFail($id);

        if($booking->delete()) {
            return new BookingResource($booking);
        }
    }
}

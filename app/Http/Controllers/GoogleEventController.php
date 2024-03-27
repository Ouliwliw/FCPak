<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class GoogleEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $event = new Event;
        $event->id = $request->id;
        $event->name = $request->title;
        $event->startDateTime = Carbon::parse($request->start);
        $event->endDateTime = Carbon::parse($request->end);
        $event->save();

        return response()->json(['success' => true]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(CreateEventRequest $request)
    // {
    //     $data = $request->all();
    //     $data['user_id'] = auth()->user()->id;
    //     $eventService = new GoogleEventService(auth()->user());
    //     $event = $eventService->create($data);
    //     if ($event) {
    //         return response()->json([
    //             'success' => true,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //         ]);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $eventId)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $eventId)
    {
        dd($eventId, "oui");
        // $event = Event::find($eventId);
        // $event->delete();
    }
}

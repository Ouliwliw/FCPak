<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event as GoogleCalendarEvent;

class GoogleEventService
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function create($data)
    {

        $event = new GoogleCalendarEvent($data);
        $event->save();

        return $event;
    }

    public function update(Request $request, $id)
    {

        $event = GoogleCalendarEvent::find($id);
        if (!$event) {
            return response()->json(['success' => false, 'message' => 'Event not found'], 404);
        }

        $event->name = $request->title;
        $event->startDateTime = Carbon::parse($request->start);
        $event->endDateTime = Carbon::parse($request->end);
        $event->save();

        return response()->json(['success' => true]);
    }

    public function allEvents($filters)
    {

        $eventQuery = GoogleCalendarEvent::get();
        return $eventQuery;
        // $eventQuery->where('user_id', $this->user->id);
        // if ($filters['start']) {
        //     $eventQuery->where('start', '>=', $filters['start']);
        // }
        // if ($filters['end']) {
        //     $eventQuery->where('end', '<=', $filters['end']);
        // }
        // $events = $eventQuery->get();
        // $data = [];
        // foreach ($events as $event) {
        //     if (! (int) $event['is_all_day']) {
        //         $event['allDay'] = false;
        //         $event['start'] = Carbon::createFromTimeStamp(strtotime($event['start']))->toDateTimeString();
        //         $event['end'] = Carbon::createFromTimeStamp(strtotime($event['end']))->toDateTimeString();
        //         $event['endDay'] = $event['end'];
        //         $event['startDay'] = $event['start'];
        //     } else {
        //         $event['allDay'] = true;
        //         $event['endDay'] = Carbon::createFromTimeStamp(strtotime($event['end']))->toDateString();
        //         $event['end'] = Carbon::createFromTimeStamp(strtotime($event['end']))->addDay()->toDateString();
        //         $event['startDay'] = $event['start'];
        //     }
        //     $event['event_id'] = $event['id'];
        //     array_push($data, $event);
        // }

        // return $data;
    }
}

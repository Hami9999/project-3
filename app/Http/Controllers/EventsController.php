<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsPostRequest;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return response()->json($events);
    }

    public function show(Events $event)
    {
        try {
            return response()->json($event);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

    }

    public function store(EventsPostRequest $request)
    {
        try {
            $data = $request->validated();
            $event = Events::create($data);
            return response()->json([
                "message" => "Event Added.",
                "Event" => $event
            ],200);
        }
        catch (\Exception $e) {
            return $e;
        }

    }

    public function destroy(Events $event)
    {
        try {
            $event->delete();
            return response()->json([
                "message" => "Event Deleted."
            ],200);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateEvent(EventsPostRequest $request,Events $event)
    {

        $data = $request->validated();

        if($data){
            $event->name = is_null($data['name']) ? $event->name : $data['name'];
            $event->location = is_null($data['location']) ? $event->location : $data['location'];
            $event->date = is_null($data['date']) ? $event->date : $data['date'];
            $event->user_id = Auth::user()->id;
            $event->save();
            return response()->json([
                "message" => "Event Updated.",
                "Event" => $event
            ],200);
        }else{
            return response()->json([
                "message" => "Event Not Found."
            ],404);
        }
    }
}

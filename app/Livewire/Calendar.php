<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Calendar extends Component
{
    public function newEvent($name, $startDate, $endDate)
    {
        $validated = Validator::make(
            [
                'name' => $name,
                'start_time' => $startDate,
                'end_time' => $endDate,
            ],
            [
                'name' => 'required|min:1|max:40',
                'start_time' => 'required',
                'end_time' => 'required',
            ]
        )->validate();

        $event = Event::create(
            $validated
        );

        return $event->id;
    }

    public function updateEvent($id, $name, $startDate, $endDate)
    {
        $validated = Validator::make(
            [
                'start_time' => $startDate,
                'end_time' => $endDate,
            ],
            [
                'start_time' => 'required',
                'end_time' => 'required',
            ]
        )->validate();

        Event::findOrFail($id)->update($validated);
    }

    public function render()
    {
        $events = [];

        foreach (Event::all() as $event) {
            $events[] =  [
                'id' => $event->id,
                'title' => $event->name,
                'start' => $event->start_time->toIso8601String(),
                'end' => $event->end_time->toIso8601String(),
            ];
        }

        return view('livewire.calendar', [
            'events' => $events
        ]);
    }
}

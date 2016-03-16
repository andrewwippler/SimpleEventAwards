<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\School;
use App\Division;
use App\Event;
use App\Competition;
use Flash;

class Events extends Controller
{
  public function index()
  {
    return view('events.index', ['event' => Event::where('competition_id', '0')->orderBy('position')->orderBy('name')->get()]);
  }
  public function show(Event $event)
  {
    $schools = School::where('active', '1')->get();
    return view('events.show', ['event' => $event->load('divisions.places'), 'schools' => $schools]);
  }
  public function create(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
      'position' => 'required|numeric',
    ]);

    $event = new Event;
    $event->name = $request->name;
    $event->competition_id = $request->competition_id;
    $event->position = isset($request->position) ? $request->position : 0;

    $event->save();

    Flash::message("$event->name created successfully");

    if ($request->competition_id == 0)
    {
        return redirect('/event');
    }

    return redirect('/competition/'.$request->competition_id);
  }

  public function edit(Event $event)
  {
    return view('events.edit', ['event' => $event]);
  }

  public function update(Request $request, Event $event)
  {

    $this->validate($request, [
      'name' => 'required|max:255',
      'position' => 'required|numeric',
    ]);

    $event->name = $request->name;
    $event->position = $request->position;

    $event->save();

    Flash::message("$event->name successfully updated");

    if ($event->competition_id == 0)
    {
        return redirect('/event');
    }

    return redirect("/competition/$event->competition_id");
  }

  public function delete(Event $event)
  {
    return view('events.delete', ['event' => $event]);
  }


  public function destroy(Event $event)
  {
    Flash::message("Event $event->name deleted");

    $comp = $event->competition_id;
    $event->delete();

    if ($event->competition_id == 0)
    {
        return redirect('/event');
    }

    return redirect("/competition/$comp");
  }

}

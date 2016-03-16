<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Events;
use App\Event;
use Flash;
use App\Division;
use App\School;
use App\Place;

class Competitions extends Controller
{
    public function index()
    {
      return view('competitions.index', ['competition' => Competition::all()]);
    }

    public function show(Competition $comp)
    {
      $c = $comp->events()->orderBy('position')->orderBy('name')->get();

      return view('competitions.show', ['competition' => $comp, 'c' => $c]);
    }

    /**
     * Creates a new competition
     */
    public function create(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'year' => 'required|date_format:Y|max:4',
      ]);

      $competition = new Competition;
      $competition->name = $request->name;
      $competition->year = $request->year;
      $competition->save();

      return redirect('/');
    }

    public function destroy(Competition $comp)
    {
      $comp->delete();

      return redirect('/');
    }

    public function copy(Competition $comp)
    {
      $events = Event::where('competition_id', '0')->orderBy('position')->orderBy('name')->get();
      foreach($events as $event)
      {
        $newEvent = new Event;
        $newEvent->name = $event->name;
        $newEvent->competition_id = $comp->id;
        $newEvent->position = $event->position;
        $newEvent->save();
      }

      Flash::message('Default events copied');

      return redirect("/competition/$comp->id");
    }

    public function printResults(Competition $comp)
    {
      $c = $comp->with('events.divisions.places')->orderBy('position')->orderBy('name')->get();
      return view('competitions.print', ['competition' => $c]);
    }

    public function enterResults(Competition $comp)
    {
      $c = $comp->with('events.divisions.places')->orderBy('position')->orderBy('name')->get();
      $divisions = Division::where('event_id', '0')->get();
      $schools = School::where('active', '1')->get();
      return view('competitions.enter', ['competition' => $c,
                                         'divisions'   => $divisions,
                                         'schools'     => $schools,
                                       ]);
    }

    public function addResults(Request $request)
    {

      $this->validate($request, [
        'firstPlace' => 'required|max:255',
        'secondPlace' => 'required|max:255',
        'thirdPlace' => 'required|max:255',
        'judges' => 'required|max:255',
        'selectDivision' => 'required',
      ]);

      $place1 = new Place;
      $place1->student = $request->firstPlace;
      $place1->school = $request->firstPlaceSelectSchool;
      $place1->position = 1;

      $place2 = new Place;
      $place2->student = $request->secondPlace;
      $place2->school = $request->secondPlaceSelectSchool;
      $place2->position = 2;

      $place3 = new Place;
      $place3->student = $request->thirdPlace;
      $place3->school = $request->thirdPlaceSelectSchool;
      $place3->position = 3;

      $copyDivision = Division::find($request->selectDivision);
      $division = new Division;
      $division->judges = $request->judges;
      $division->command = isset($request->commandPerformance) ? $request->commandPerformance : 0;
      $division->name = $copyDivision->name;
      $division->position = $copyDivision->position;

      $event = Event::find($request->selectEvent);

      $event->divisions()->save($division);
      $division->places()->saveMany([$place1,$place2,$place3]);


      Flash::success('Results updated');
      return redirect('competition/'.$request->competition_id.'/enter');
    }
}

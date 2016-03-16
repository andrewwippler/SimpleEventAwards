<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Division;
use App\Place;
use App\Event;
use Flash;

class Divisions extends Controller
{
  public function index()
  {
    return view('divisions.index', ['divisions' => Division::where('default', '1')->orderBy('position')->orderBy('name')->get()]);
  }

  public function create(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
      'position' => 'required|numeric',
    ]);

    $division = new Division;
    $division->default = true;
    $division->name = $request->name;
    $division->position = isset($request->position) ? $request->position : 0;

    $division->save();

    Flash::message("$division->name created successfully");

    return redirect('/division/');
  }

  public function edit(Division $division)
  {
    return view('divisions.edit', ['division' => $division]);
  }

  public function update(Request $request, Division $division)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
      'position' => 'required|numeric',
    ]);

    $division->name = $request->name;
    $division->position = $request->position;
    $division->save();

    Flash::message("$division->name successfully updated");

    return redirect('/division/');
  }

  public function delete(Division $division)
  {
    return view('divisions.delete', ['division' => $division]);
  }

  public function destroy(Division $division)
  {
    Flash::message("Division $division->name deleted");

    $division->delete();

    return redirect("/division/");
  }

  public function updateResults(Request $request, Division $division)
  {

    $this->validate($request, [
        'firstPlace' => 'required|max:255',
        'secondPlace' => 'required|max:255',
        'thirdPlace' => 'required|max:255',
        'judges' => 'required|max:255',
      ]);

      //$division = Division::find($request->division_id);
      $division->judges = $request->judges;
      $division->command = isset($request->commandPerformance) ? $request->commandPerformance : 0;

        $place1 = Place::find($request->firstPlaceId);
        $place1->student = $request->firstPlace;
        $place1->school = $request->firstPlaceSelectSchool;
        $place1->position = 1;

        $place2 = Place::find($request->secondPlaceId);
        $place2->student = $request->secondPlace;
        $place2->school = $request->secondPlaceSelectSchool;
        $place2->position = 2;

        $place3 = Place::find($request->thirdPlaceId);
        $place3->student = $request->thirdPlace;
        $place3->school = $request->thirdPlaceSelectSchool;
        $place3->position = 3;




        $event = Event::find($request->event_id);

        $event->divisions()->save($division);
        $division->places()->saveMany([$place1,$place2,$place3]);

    Flash::success("$event->name, $division->name successfully updated");

    return redirect("/event/$event->id");
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\School;
use Flash;

class Schools extends Controller
{
  public function index()
  {
    return view('schools.index', ['schools' => School::all()->sortBy('name') ]);
  }

  public function create(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
    ]);

    $school = new School;
    $school->name = $request->name;
    $school->active = isset($request->active) ? true : false;
    $school->save();

    Flash::message("$school->name created successfully");

    return redirect('/school/');
  }

  public function edit(School $school)
  {
    return view('schools.edit', ['school' => $school]);
  }

  public function update(Request $request, School $school)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
    ]);

    $school->name = $request->name;
    $school->active =  isset($request->active) ? true : false;
    $school->save();

    Flash::message("$school->name successfully updated");

    return redirect('/school/');
  }

  public function delete(School $school)
  {
    return view('schools.delete', ['school' => $school]);
  }

  public function destroy(School $school)
  {
    Flash::message("School $school->name deleted");

    $school->delete();

    return redirect("/school/");
  }
}

@extends('layout.app')

@section('title', 'Enter Competition Results')

@section('content')

<div class="row">

<h1>Competition Results</h1>

<form class="form-horizontal" action="/competition/results" method="post">
  {{ csrf_field() }}
  <input type="hidden" value="{{$competition[0]->id}}" name="competition_id">
  <fieldset>
<legend>Add Result</legend>

<div class="form-group">
  <label class="col-lg-2 control-label" for="selectEvent">Event</label>
  <div class="col-lg-10">
    <select name="selectEvent" class="form-control">
      @foreach($competition[0]->events as $event)
          <option value="{{$event->id}}">{{$event->name}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-lg-2 control-label" for="selectDivision">Division</label>
  <div class="col-lg-10">
    <select name="selectDivision" class="form-control">
      @foreach($divisions as $division)
          <option value="{{$division->id}}">{{$division->name}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label" for="firstPlace">First Place</label>
  <div class="col-lg-4 ">
    <input class="form-control" name="firstPlace" type="text" placeholder="First Place" id="firstPlace"></input>
  </div>
</div>
<div class="form-group">
  <label class="col-lg-2 control-label" for="firstPlaceSelectSchool">School</label>
  <div class="col-lg-4">
    <select class="form-control" name="firstPlaceSelectSchool">
      @foreach($schools as $school)
        <option value="{{$school->name}}">{{$school->name}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label" for="secondPlace">Second Place</label>
  <div class="col-lg-4 ">
    <input class="form-control" name="secondPlace" type="text" placeholder="Second Place" id="secondPlace"></input>
  </div>
</div>
<div class="form-group">
  <label class="col-lg-2 control-label" for="secondPlaceSelectSchool">School</label>
  <div class="col-lg-4">
    <select class="form-control" name="secondPlaceSelectSchool">
      @foreach($schools as $school)
        <option value="{{$school->name}}">{{$school->name}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label" for="thirdPlace">Third Place</label>
  <div class="col-lg-4 ">
    <input class="form-control" name="thirdPlace" type="text" placeholder="Third Place" id="thirdPlace"></input>
  </div>
</div>
<div class="form-group">
  <label class="col-lg-2 control-label" for="thirdPlaceSelectSchool">School</label>
  <div class="col-lg-4">
    <select class="form-control" name="thirdPlaceSelectSchool">
      @foreach($schools as $school)
        <option value="{{$school->name}}">{{$school->name}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-2 control-label" for="judges">Judges</label>
  <div class="col-lg-4 ">
    <input class="form-control" name="judges" type="text" placeholder="Judges (separated by commas)" id="thirdPlace"></input>
  </div>
</div>

<div class="form-group">
  <div class="checkbox col-lg-10 col-lg-offset-2">
    <label>
      <input type="checkbox" name="commandPerformance"></input>
      Eligible for Command Performance
    </label>
  </div>
</div>

<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
  <button type="submit" class="btn btn-success">Enter Result</button>
</div>
</div>
</fieldset>
</form>


</div>
@endsection

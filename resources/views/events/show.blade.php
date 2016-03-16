
@extends('layout.app')

@section('title', 'Events')

@section('content')
    <div class="row">

    <h1>{{$event->name}}</h1>

    @if(count($event->divisions) > 0)



    @foreach($event->divisions as $division)
      <form class="form-horizontal" action="/division/{{$division->id}}/results" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <fieldset>
          <legend>{{$division->name}}</legend>
          <input type="hidden" value="{{$division->id}}" name="division_id">
          <input type="hidden" value="{{$division->event_id}}" name="event_id">

          <div class="form-group">
            <label class="col-lg-2 control-label" for="firstPlace">First Place</label>
            <div class="col-lg-4 ">
              <input type="hidden" name="firstPlaceId" value="{{$division->places[0]->id}}"></input>
              <input class="form-control" value="{{$division->places[0]->student}}" name="firstPlace" type="text" placeholder="First Place" id="firstPlace"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label" for="firstPlaceSelectSchool">School</label>
            <div class="col-lg-4">
              <select class="form-control" name="firstPlaceSelectSchool">
                @foreach($schools as $school)
                  <option value="{{$school->name}}" @if ($division->places[0]->school == $school->name) SELECTED @endif>{{$school->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label" for="secondPlace">Second Place</label>
            <div class="col-lg-4 ">
              <input type="hidden" name="secondPlaceId" value="{{$division->places[1]->id}}"></input>
              <input class="form-control" value="{{$division->places[1]->student}}"  name="secondPlace" type="text" placeholder="Second Place" id="secondPlace"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label" for="secondPlaceSelectSchool">School</label>
            <div class="col-lg-4">
              <select class="form-control" name="secondPlaceSelectSchool">
                @foreach($schools as $school)
                  <option value="{{$school->name}}" @if ($division->places[1]->school == $school->name) SELECTED @endif>{{$school->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label" for="thirdPlace">Third Place</label>
            <div class="col-lg-4 ">
              <input type="hidden" name="thirdPlaceId" value="{{$division->places[2]->id}}"></input>
              <input class="form-control" value="{{$division->places[2]->student}}" name="thirdPlace" type="text" placeholder="Third Place" id="thirdPlace"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label" for="thirdPlaceSelectSchool">School</label>
            <div class="col-lg-4">
              <select class="form-control" name="thirdPlaceSelectSchool">
                @foreach($schools as $school)
                  <option value="{{$school->name}}" @if ($division->places[2]->school == $school->name) SELECTED @endif>{{$school->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label" for="judges">Judges</label>
            <div class="col-lg-4 ">
              <input class="form-control" value="{{$division->judges}}" name="judges" type="text" placeholder="Judges (separated by commas)" id="thirdPlace"></input>
            </div>
          </div>

          <div class="form-group">
            <div class="checkbox col-lg-10 col-lg-offset-2">
              <label>
                <input type="checkbox" name="commandPerformance" @if ($division->command) CHECKED
                @endif></input>
                Eligible for Command Performance
              </label>
            </div>
          </div>

        </fieldset>
        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-success">Submit {{$division->name}} Results</button>
        </div>
      </div>
    </form>
        @endforeach


@endif


    </div>
@endsection

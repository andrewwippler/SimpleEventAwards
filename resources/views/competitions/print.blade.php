@extends('layout.app')

@section('title', 'Competition Results')

@section('content')

<div class="row">
  @foreach($competition[0]->events as $event)
    <h3>{{$event->name}}</h3>
    @foreach($event->divisions as $division)
      <h4>{{$division->name}}</h4>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>First Place</th>
            <th>Second Place</th>
            <th>Third Place</th>
          </tr>
        </thead>
          <tbody>
            <tr>
            @foreach($division->places as $place)
              <td>{{$place->student}}<br>{{$place->school}}</td>
            @endforeach
          </tr>
        </tbody>
    </table>

    @endforeach

  @endforeach

</div>
@endsection


@extends('layout.app')

@section('title', 'Competition Events')

@section('content')

<div class="row">


@if (count($c) > 0)

  <a href="/competition/{{$competition->id}}/print" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>  Print All Results</a>

  <a href="/competition/{{$competition->id}}/enter" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>  Enter Results</a>

  <h1>Events for {{ $competition->name }}</h1>
      <table class="table takel-striped table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
        @foreach($c as $event)
          <tr>
            <td>{{ $event->name }}</td>
            <td><a href="/event/{{$event->id}}" class="btn btn-primary">Results</a> <a href="/event/{{$event->id}}/edit" class="btn btn-success">Edit</a> <a href="/event/{{$event->id}}/delete" class="btn btn-danger">Delete</a></td>

          </tr>
        @endforeach
        </tbody>
      </table>

      <br>
      <form class="form-horizontal" action="/event/new" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="competition_id" value="{{ $competition->id }}">
        <fieldset>
    <legend>Add New Event</legend>
    <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-4">
        <input name="name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAALZJREFUOBFjYKAANDQ0rGWiQD9IqzgL0BQ3IKMXiB8AcSKQ/waIrYDsKUD8Fir2pKmpSf/fv3+zgPxfzMzMSbW1tbeBbAaQC+b+//9fB4h9gOwikCAQTAPyDYHYBciuBQkANfcB+WZAbPP37992kBgIUOoFBiZGRsYkIL4ExJvZ2NhAXmFgYmLKBPLPAfFuFhaWJpAYEBQC+SeA+BDQC5UQIQpJYFgdodQLLyh0w6j20RCgUggAAEREPpKMfaEsAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" class="form-control" id="name" placeholder="Name" type="text">
      </div>
    </div>
      <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
      </form>

@else

  <a href="/competition/{{ $competition->id }}/copy" class="btn btn-info"><span class="glyphicon glyphicon-copy"></span>  Copy Default Events</a>
  <br>
  <form class="form-horizontal" action="/event/new" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="competition_id" value="{{ $competition->id }}">
    <fieldset>
<legend>Add New Event</legend>
<div class="form-group">
  <label for="name" class="col-lg-2 control-label">Name</label>
  <div class="col-lg-4">
    <input name="name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAALZJREFUOBFjYKAANDQ0rGWiQD9IqzgL0BQ3IKMXiB8AcSKQ/waIrYDsKUD8Fir2pKmpSf/fv3+zgPxfzMzMSbW1tbeBbAaQC+b+//9fB4h9gOwikCAQTAPyDYHYBciuBQkANfcB+WZAbPP37992kBgIUOoFBiZGRsYkIL4ExJvZ2NhAXmFgYmLKBPLPAfFuFhaWJpAYEBQC+SeA+BDQC5UQIQpJYFgdodQLLyh0w6j20RCgUggAAEREPpKMfaEsAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" class="form-control" id="name" placeholder="Name" type="text">
  </div>
</div>
  <div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</fieldset>
  </form>
@endif

</div>
@endsection

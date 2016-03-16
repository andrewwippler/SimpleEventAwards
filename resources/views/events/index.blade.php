
@extends('layout.app')

@section('title', 'All Default Events')

@section('content')

    <div class="row">
      <h1>Default Events</h1>
      <table class="table takel-striped table-hover">
        <thead>
          <tr>
            <th>Position</th>
            <th>Name</th>
            <th> </th>

          </tr>
        </thead>
        <tbody>
          @foreach($event as $event)
            <tr>
              <td>{{ $event->position }}</td>
              <td>{{ $event->name }} </td>
              <td>

                  <a class="btn btn-success" href="/event/{{ $event->id }}/edit">Edit</a>
                  <a class="btn btn-danger" href="/event/{{ $event->id }}/delete">Delete</a>
              </td>

            </tr>
          @endforeach
        </tbody>
      </table>

      <br>
      <form class="form-horizontal" action="/event/new" method="post">
        {{ csrf_field() }}
        <input type="hidden" value="0" name="competition_id">
        <fieldset>
    <legend>Add New Event</legend>
    <div class="form-group">
      <label for="position" class="col-lg-2 control-label">Position</label>
      <div class="col-lg-4">
        <input name="position" value="0" class="form-control" id="position" placeholder="Position" type="text">
      </div>
    </div>
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
    </div>

@endsection

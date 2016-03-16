
@extends('layout.app')

@section('title', 'All Competitions')

@section('content')

    <div class="row">

      <table class="table table-striped table-hover">
        <thead>
          <tr>

            <th>Year</th>
            <th>Name</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
          @foreach($competition as $comp)
            <tr>
              <td>{{ $comp->year }}</td>
              <td><a href="/competition/{{ $comp->id }}">{{ $comp->name }}</a></td>
              <td><form action="/competition/{{ $comp->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">Delete</button>
        </form></td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <br>
      <form class="form-horizontal" action="/competition/new" method="post">
        {{ csrf_field() }}
        <fieldset>
    <legend>Add New Competition</legend>
    <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-4">
        <input name="name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAALZJREFUOBFjYKAANDQ0rGWiQD9IqzgL0BQ3IKMXiB8AcSKQ/waIrYDsKUD8Fir2pKmpSf/fv3+zgPxfzMzMSbW1tbeBbAaQC+b+//9fB4h9gOwikCAQTAPyDYHYBciuBQkANfcB+WZAbPP37992kBgIUOoFBiZGRsYkIL4ExJvZ2NhAXmFgYmLKBPLPAfFuFhaWJpAYEBQC+SeA+BDQC5UQIQpJYFgdodQLLyh0w6j20RCgUggAAEREPpKMfaEsAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" class="form-control" id="name" placeholder="Name" type="text">
      </div>
    </div>
    <div class="form-group">
      <label for="year" class="col-lg-2 control-label">Year</label>
      <div class="col-lg-4">
        <input name="year" value="{{ date("Y") }}" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAALZJREFUOBFjYKAANDQ0rGWiQD9IqzgL0BQ3IKMXiB8AcSKQ/waIrYDsKUD8Fir2pKmpSf/fv3+zgPxfzMzMSbW1tbeBbAaQC+b+//9fB4h9gOwikCAQTAPyDYHYBciuBQkANfcB+WZAbPP37992kBgIUOoFBiZGRsYkIL4ExJvZ2NhAXmFgYmLKBPLPAfFuFhaWJpAYEBQC+SeA+BDQC5UQIQpJYFgdodQLLyh0w6j20RCgUggAAEREPpKMfaEsAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" class="form-control" id="year" placeholder="Year" type="text">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
      </form>
      {{-- show button to create new --}}

    </div>

@endsection


@extends('layout.app')

@section('title', 'Edit School')

@section('content')
    <div class="row">
      <form class="form-horizontal" action="/school/{{$school->id}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <fieldset>
          <legend>Edit school</legend>
          <div class="form-group">
            <label for="name" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-4">
              <input value="{{$school->name}}" name="name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAALZJREFUOBFjYKAANDQ0rGWiQD9IqzgL0BQ3IKMXiB8AcSKQ/waIrYDsKUD8Fir2pKmpSf/fv3+zgPxfzMzMSbW1tbeBbAaQC+b+//9fB4h9gOwikCAQTAPyDYHYBciuBQkANfcB+WZAbPP37992kBgIUOoFBiZGRsYkIL4ExJvZ2NhAXmFgYmLKBPLPAfFuFhaWJpAYEBQC+SeA+BDQC5UQIQpJYFgdodQLLyh0w6j20RCgUggAAEREPpKMfaEsAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" class="form-control" id="name" placeholder="Name" type="text">
            </div>


            <div class="checkbox col-lg-10 col-lg-offset-2">
              <label>
                <input  type="checkbox" name="active" @if ($school->active) CHECKED @endif ></input>
                Active
              </label>
            </div>
          </div>

            <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </fieldset>
      </form>

    </div>

@endsection

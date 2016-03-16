
@extends('layout.app')

@section('title', 'Edit event')

@section('content')
    <div class="row">
      <form class="form-horizontal" action="/event/{{$event->id}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <fieldset>
          <legend>Edit Event</legend>
          <div class="form-group">
            <label for="position" class="col-lg-2 control-label">Position</label>
            <div class="col-lg-4">
              <input name="position" value="{{ $event->position }}" class="form-control" id="position" placeholder="Position" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-4">
              <input name="name" value="{{ $event->name }}" class="form-control" id="name" placeholder="Name" type="text">
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

    {{-- show edit button --}}
@endsection

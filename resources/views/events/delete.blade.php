
@extends('layout.app')

@section('title', 'Events')

@section('content')

  <div class="row">

    <h1>Are you sure you want to delete {{$event->name}}?</h1>

    <form action="/event/{{ $event->id }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button class="btn btn-danger">Delete</button>
  </form>

</div>
@endsection

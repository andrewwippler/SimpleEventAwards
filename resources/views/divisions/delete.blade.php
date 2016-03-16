
@extends('layout.app')

@section('title', 'Division')

@section('content')

  <div class="row">

    <h1>Are you sure you want to delete {{$division->name}}?</h1>

    <form action="/division/{{ $division->id }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button class="btn btn-danger">Delete</button>
  </form>

</div>
@endsection

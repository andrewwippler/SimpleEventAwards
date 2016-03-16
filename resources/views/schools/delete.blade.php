
@extends('layout.app')

@section('title', 'Delete School')

@section('content')

  <div class="row">

    <h1>Are you sure you want to delete {{$school->name}}?</h1>

    <form action="/school/{{ $school->id }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}

  <button class="btn btn-danger">Delete</button>
  </form>

</div>
@endsection

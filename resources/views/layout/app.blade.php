<!DOCTYPE html>
<html>
    <head>
        <title>{!!env('NAME')!!} - @yield('title')</title>
       <link rel="stylesheet" href="{{ asset('css/app.css') }}" media="screen" title="no title" charset="utf-8">
      </head>
    <body>
      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">{!!env('NAME')!!} </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/event">Events</a></li>
        <li><a href="/division">Divisions</a></li>
        <li><a href="/school">Schools</a></li>
      </ul>

    </div>
  </div>
</nav>

@include('flash::message')

@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <div class="container">
            @yield('content')
        </div>


        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $('#flash-overlay-modal').modal();
        </script>
    </body>
</html>

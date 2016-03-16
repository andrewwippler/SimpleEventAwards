<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

  Route::delete('/school/{school}', 'Schools@destroy');
  Route::get('/school/{school}/delete', 'Schools@delete');
  Route::get('/school/{school}/edit', 'Schools@edit');
  Route::patch('/school/{school}', 'Schools@update');
  Route::post('/school/new', 'Schools@create');
  Route::get('/school', 'Schools@index');

  Route::delete('/division/{division}', 'Divisions@destroy');
  Route::get('/division/{division}/delete', 'Divisions@delete');
  Route::get('/division/{division}/edit', 'Divisions@edit');
  Route::patch('/division/{division}', 'Divisions@update');
  Route::patch('/division/{division}/results', 'Divisions@updateResults');
  Route::post('/division/new', 'Divisions@create');
  Route::get('/division', 'Divisions@index');

  Route::delete('/event/{event}', 'Events@destroy');
  Route::get('/event/{event}/delete', 'Events@delete');
  Route::get('/event/{event}/edit', 'Events@edit');
  Route::patch('/event/{event}', 'Events@update');
  Route::get('/event/{event}', 'Events@show');
  Route::post('/event/new', 'Events@create');
  Route::get('/event', 'Events@index');

  Route::delete('/competition/{comp}', 'Competitions@destroy');
  Route::patch('/competition/{comp}', 'Competitions@update');
  Route::get('/competition/{comp}/copy', 'Competitions@copy');
  Route::get('/competition/{comp}', 'Competitions@show');
  Route::get('/competition/{comp}/print', 'Competitions@printResults');
  Route::get('/competition/{comp}/enter', 'Competitions@enterResults');
  Route::post('/competition/new', 'Competitions@create');
  Route::post('/competition/results', 'Competitions@addResults');
  Route::get('/', 'Competitions@index');

});

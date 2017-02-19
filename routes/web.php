<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



use Illuminate\Support\Facades\Route;

Route::get('/', function () {


    return view('welcome');
});


Route::get('/activities', 'ActivitiesController@index');
Route::get('/activities/{id}', 'ActivitiesController@index');
Route::get('/addresses', 'AddressesController@index');
Route::get('/addresses/{id}', 'AddressesController@index');
Route::get('/agents', 'AgentsController@index');
Route::get('/agents/{id}', 'AgentsController@index');
Route::get('/carriers', 'CarriersController@index');
Route::get('/carriers/{id}', 'CarriersController@index');
Route::get('/reports', 'ReportsController@index');
Route::get('/reports/{id}', 'ReportsController@index');
Route::get('/individuals', 'IndividualsController@index');
Route::get('/individuals/{id}', 'IndividualsController@index');
Route::get('/policies', 'PoliciesController@index');
Route::get('/policies/{id}', 'PoliciesController@index');
Route::get('/x12editor', 'X12EditorController@index');
Route::get('/x12editor/{id}', 'X12EditorController@index');

Route::get('upload', function() {
    return View::make('/upload');
});

Route::post('apply/upload', 'ApplyController@upload');


Route::get('/reports2', function () {



    echo "Test return screen";

});


Route::get('/listRoutes', function() {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='80%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";

       echo "<td>" . $value->uri() . "</td>";

    }
    echo "</table>";
});

Route::get('blade', function () {
    return view('child');
});
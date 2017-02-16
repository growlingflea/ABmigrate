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



Route::get('/reports', 'ReportsController@index');
Route::get('/reports/{id}', 'ReportsController@index');


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
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
*/

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');
# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');
# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');
# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');


Route::group(['middleware' => 'auth'], function () {


  Route::get('/', 'LichenController@getIndex');
  # Process logout
  Route::get('/logout', 'Auth\AuthController@logout');
  #presents the user with the upload window
  Route::get('/upload', 'LichenController@getUpload');
  # uploads the user's form data
  Route::post('/upload', 'LichenController@postUpload');
  # loads the files for the selected folder
  Route::get('/{project}', 'LichenController@getProject');
  # loads the edit window
  Route::get('/edit/{file}', 'LichenController@getEdit');

  Route::post('/edit/{file}', 'LichenController@postEdit');

  # loads the delete window
  Route::get('/delete/{file}', 'LichenController@getDelete');

});


if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database lichen');
        DB::statement('CREATE database lichen');

        return 'Dropped lichen; created lichen.';
    });

};


/*Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.

    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

}); */

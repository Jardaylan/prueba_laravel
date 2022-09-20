<?php

use App\Models\People;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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

Route::get('/', function () {
    $json = File::get('json/colombia.json');
    $data = json_decode($json, true);

    $people = People::all();
    $peopleWin = null;
    $winner = 0;
    if (count($people) > 5) {
        $peopleWin = People::all()->random(1);
        $winner = count($people);
    }
    return view('welcome', compact('data', 'winner', 'peopleWin'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/peoples', [App\Http\Controllers\PeopleController::class, 'index']);
Route::post('/consultMunicipality', [App\Http\Controllers\PeopleController::class, 'consultMunicipality']);
Route::post('/savePeople', [App\Http\Controllers\PeopleController::class, 'savePeople'])->name('savePeople');


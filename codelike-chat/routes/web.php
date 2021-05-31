<?php

use App\Events\MessageEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('chat');
});

Route::get('/message', function (Request $request) {
    if (isset($request->message)) {
        broadcast(new MessageEvent($request->message));
    }
    return view('chat');
});



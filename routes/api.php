<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'ParsingController@index');

Route::get('/get-py', function (){
   /*echo shell_exec("python -V 2>&1");*/
    echo shell_exec("source /home/users/r/remdance/domains/hack.cofro.ru/py/env/bin/activate train.py 2>&1");
    /*echo shell_exec("python /home/users/r/remdance/domains/hack.cofro.ru/py/train.py 2>&1");*/
    /*return shell_exec("source /home/users/r/remdance/domains/hack.cofro.ru/py/env/bin/activate /home/users/r/remdance/domains/47h.cofro.ru/train.py 2>&1");*/
});


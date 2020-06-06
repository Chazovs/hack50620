<?php

use App\Http\Controllers\ParsingController;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/get-py', function () {
    /*echo shell_exec("python -V 2>&1");*/
    try {
        echo 'я тут<br><br>';
        echo exec('/home/users/r/remdance/domains/hack.cofro.ru/py/env/bin/activate /home/users/r/remdance/domains/47h.cofro.ru/test.py 2>&1');
        /*echo shell_exec("/home/users/r/remdance/domains/hack.cofro.ru/py/env/bin/activate python /home/users/r/remdance/domains/47h.cofro.ru/test.py 2>&1");*/
    } catch (Throwable $e) {
        echo $e->getMessage();
    }

    /*echo shell_exec("python /home/users/r/remdance/domains/hack.cofro.ru/py/train.py 2>&1");*/
    /*return shell_exec("source /home/users/r/remdance/domains/hack.cofro.ru/py/env/bin/activate /home/users/r/remdance/domains/47h.cofro.ru/train.py 2>&1");*/
});


Route::post('/new/file', function (Request $request) {


    $name = $request->file->store('/');
    /*$input = $request->all();*/
    /*$file = $request->file('file');*/

    /*return response(['status'=> 'success', 'message' => $request], 200)
        ->header('Content-Type', 'text/plain');


     $content = file_get_contents(public_path('data/001.rtf'));
     $contentencode = base64_encode($content);
        $file = $request->file;*/
    /*Storage::put($request->fileName, $file);*/
    /* Storage::put('tmp.rtf', $file);
     */
    $pars = new  ParsingController;
    $filePath = public_path('/app/' . $name);
    $resultParsing = $pars->index2($filePath);


    $response = [
        'status' => 'success',
        'type' => 'ДОЛЖНОСТНАЯ ИНСТРУКЦИЯ',
        'subtype' => 'АГРОЛЕСОМЕЛИОРАТОР',
        'path' => 'instructions/prof/agrolesomeliator/' . $request->fileName,
        'resultParsing' => $resultParsing,
    ];

    return json_encode($response);

    /*json_encode($response);*/
});

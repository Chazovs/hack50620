<?php

use App\Http\Controllers\ParsingController;
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


Route::post('/new/file', function (Request $request) {
 $content = file_get_contents(public_path('data/001.rtf'));
 $contentencode = base64_encode($content);
    $file = $request->file;
    Storage::put($request->fileName, base64_decode($file));

    $pars          = new  ParsingController;
    $filePath      = public_path('/app/' . $request->fileName);
    $resultParsing = $pars->index2($filePath);


    $response = [
        'type'          => 'ДОЛЖНОСТНАЯ ИНСТРУКЦИЯ',
        'subtype'       => 'АГРОЛЕСОМЕЛИОРАТОР',
        'path'          => 'Путь в каталоге: instructions/prof/agrolesomeliator/' . $request->fileName,
        'resultParsing' => $resultParsing,
    ];

    return json_encode($response);

        /*json_encode($response);*/
});

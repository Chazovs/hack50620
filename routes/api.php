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

    $pars          = new  ParsingController;
    $filePath      = public_path('/app/' . $name);
    $resultParsing = $pars->index2($filePath);


    $response = [
        'status'        => 'success',
        'type'          => 'ДОЛЖНОСТНАЯ ИНСТРУКЦИЯ',
        'subtype'       => 'АГРОЛЕСОМЕЛИОРАТОР',
        'path'          => 'instructions/prof/agrolesomeliator/' . $request->fileName,
        'resultParsing' => $resultParsing,
    ];

    return json_encode($response);
});


Route::post('/new/file/with/ai', function (Request $request) {



    $name = $request->file->store('/');

    $pars          = new  ParsingController;
    $filePath      = public_path('/app/' . $name);
    $resultParsing = $pars->index3($filePath);

    $resObj = json_decode($resultParsing);

    $client = new GuzzleHttp\Client();
    $response = $client->request('POST', 'https://vast-sands-79590.herokuapp.com', ['json' => ['text' => $resObj->text]]);

    $aiResponse = $response->getBody()->getContents();


    $response = [
        'status'        => 'success',
        'type'          => 'ДОЛЖНОСТНАЯ ИНСТРУКЦИЯ',
        'subtype'       => 'АГРОЛЕСОМЕЛИОРАТОР',
        'path'          => 'instructions/prof/agrolesomeliator/' . $request->fileName,
        'resultParsing' => $aiResponse,
    ];

    return json_encode($response);

});


Route::get('/big-raspars', function (Request $request) {




    for ($i = 1; $i < 709; $i++) {
        $istr          = (string) $i;
        $fileName      = str_pad($i, 3, '0', STR_PAD_LEFT);
        $fileName2      = $fileName . '.rtf';
        $filePath      = public_path('/data/' . $fileName2);
        $pars          = new  ParsingController;
        $resultParsing = $pars->index3($filePath);

        $result = Storage::disk('local')->put($fileName.'.json', $resultParsing);

    }
});


Route::get('/big-raspars/{id}', function (Request $request, $id) {

    $fileName      = str_pad($id, 3, '0', STR_PAD_LEFT);
    return file_get_contents(public_path('/app/'.$fileName.'.json'));
});


Route::get('/big-raspars/{id}', function (Request $request, $id) {

    $fileName      = str_pad($id, 3, '0', STR_PAD_LEFT);
    return file_get_contents(public_path('/app/'.$fileName.'.json'));
});

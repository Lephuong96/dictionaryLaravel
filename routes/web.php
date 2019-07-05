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



Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('/index');
});
Route::post('/index', function (Illuminate\Http\Request $request) {
    $dictionaryBD = ['hello' => 'xin chao', 'yellow' => 'mau vang', 'who' => 'ai', 'red' => 'mau do'];
    $keyword = $request->keyword;
    $flag = view('/error-translate', compact('keyword'));
    foreach ($dictionaryBD as $key => $value) {
        if ($key == $keyword) {
            $flag = view('/result-translate', compact('keyword', 'value'));
        }
    }
    return $flag;
})->name('trans');
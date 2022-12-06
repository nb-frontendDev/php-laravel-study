<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UtilityController;

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

Route::get('/', fn() => view('index'));

Route::get('/curriculum', fn() => view('curriculum'));

Route::get('/hello_world', function () {
    return view('hello_world');
});

Route::get('/hello', fn () =>
view('hello', [
        'name' => '山田',
        'course' => 'laravel9'
    ])
);

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldTime']);

// おみくじ
Route::get('/omikuji', function () {
    $fortunes = ['大吉', '中吉', '小吉', '吉', '末吉', '凶', '大凶'];
    $resultIndex = array_rand($fortunes);
    $result = $fortunes[$resultIndex];
    return view('omikuji', ['result' => $result]);
});

// モンティ・ホール問題
Route::get('/monty-hall', function () {
    $results = [];
    for ($i = 0; $i < 1000; $i++) {
        $options = [true, false, false];
        shuffle($options);

        $selectedIndex = array_rand($options);
        $notSelectedIndexes = array_filter($options, fn($index) => $index !== $selectedIndex, ARRAY_FILTER_USE_KEY);
        $removeIndex = array_search(false, $notSelectedIndexes);
        unset($notSelectedIndexes[$removeIndex]);

        $changedIndex = key($notSelectedIndexes);
        $results[] = $options[$changedIndex];
    }
    $wonCount = count(array_filter($results, fn($result) => $result));
    return view('monty-hall', ['results' => $results, 'wonCount' => $wonCount]);
});
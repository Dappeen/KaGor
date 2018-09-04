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

// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('products', 'ProductController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('products/{product}/remove', 'ProductController@remove')
     ->name('products.remove');

     // Объявляем маршруты для ресурсного контроллера CommentController,
// назначая слово products префиксом URI
Route::resource('comments', 'CommentController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('comments/{comment}/remove', 'CommentController@remove')
     ->name('comments.remove');

          // Объявляем маршруты для ресурсного контроллера PhotoController,
// назначая слово products префиксом URI
Route::resource('photos', 'PhotoController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('photos/{photo}/remove', 'PhotoController@remove')
     ->name('photos.remove');

// Объявляем маршруты для ресурсного контроллера RightController,
// назначая слово products префиксом URI
Route::resource('rights', 'RightController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('rights/{right}/remove', 'RightController@remove')
     ->name('rights.remove');

     
// Объявляем маршруты для ресурсного контроллера StatuseController,
// назначая слово products префиксом URI
Route::resource('statuses', 'StatuseController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('statuses/{statuse}/remove', 'StatuseController@remove')
     ->name('statuses.remove');


     
// Объявляем маршруты для ресурсного контроллера UserController,
// назначая слово products префиксом URI
Route::resource('users', 'UserController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('users/{user}/remove', 'UserController@remove')
     ->name('users.remove');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

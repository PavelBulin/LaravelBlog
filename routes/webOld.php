<?php
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome', [
  'name' => 'Pavel'
]);

Route::redirect('/home', '/');

// в самом низу
Route::fallback(function () {
  return 'Fallback';
});
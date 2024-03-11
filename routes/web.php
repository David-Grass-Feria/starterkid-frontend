<?php

use Illuminate\Support\Facades\Route;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceCreate;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceEdit;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceIndex;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   
    Route::get('/dashboard/services',ServiceIndex::class)->name('services.index');
    Route::get('/dashboard/services/create',ServiceCreate::class)->name('services.create');
    Route::get('/dashboard/services/edit/{recordId}',ServiceEdit::class)->name('services.edit');

    


   
});
<?php

use Illuminate\Support\Facades\Route;
use GrassFeria\StarterkidFrontend\Livewire\Front\Homepage;
use GrassFeria\StarterkidFrontend\Livewire\OrganizationEdit;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceEdit;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceIndex;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceCreate;
use GrassFeria\StarterkidFrontend\Livewire\Front\Service\FrontServiceShow;
use GrassFeria\StarterkidFrontend\Livewire\Front\Service\FrontServiceIndex;






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

Route::middleware(['web'])->group(function () {
   
    Route::get('/',Homepage::class)->name('front.homepage');
    Route::get(config('starterkid-frontend.service_slug'),FrontServiceIndex::class)->name('front.service.index');
    Route::get(config('starterkid-frontend.service_slug').'/{slug}',FrontServiceShow::class)->name('front.service.show');
   
   

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   
    Route::get('/dashboard/services',ServiceIndex::class)->name('services.index');
    Route::get('/dashboard/services/create',ServiceCreate::class)->name('services.create');
    Route::get('/dashboard/services/edit/{recordId}',ServiceEdit::class)->name('services.edit');
    Route::get('/dashboard/organization/edit',OrganizationEdit::class)->name('organization.edit');

    


   
});
<?php

use Illuminate\Support\Facades\Route;
use GrassFeria\StarterkidFrontend\Livewire\Front\Homepage;
use GrassFeria\StarterkidFrontend\Livewire\Front\OrganizationEdit;
use GrassFeria\StarterkidFrontend\Livewire\Front\SitemapPage;

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
   
    Route::get('/',Homepage::class)->name('front.homepage')->middleware('cache:homepage');
    Route::get('/sitemap',SitemapPage::class)->name('front.sitemap-page');

   
   

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   
    
    
    //

    


   
});
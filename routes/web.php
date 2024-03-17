<?php

use Illuminate\Support\Facades\Route;
use GrassFeria\StarterkidFrontend\Livewire\Front\Homepage;
use GrassFeria\StarterkidFrontend\Livewire\Front\OrganizationEdit;








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
   
    Route::get('/',Homepage::class)->name('front.homepage')->where('locale', implode('|', array_diff(config('starterkid.locales'), [config('app.locale')])));
  

   
   

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   
    
    
    Route::get('/dashboard/organization/edit',OrganizationEdit::class)->name('organization.edit');

    


   
});
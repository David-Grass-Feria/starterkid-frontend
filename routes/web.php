<?php

use Illuminate\Support\Facades\Route;
use GrassFeria\StarterkidFrontend\Livewire\Front\Homepage;
use GrassFeria\StarterkidFrontend\Livewire\OrganizationEdit;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceEdit;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceIndex;
use GrassFeria\StarterkidFrontend\Livewire\BlogPost\BlogPostEdit;
use \GrassFeria\StarterkidFrontend\Livewire\Service\ServiceCreate;
use GrassFeria\StarterkidFrontend\Livewire\BlogPost\BlogPostIndex;
use GrassFeria\StarterkidFrontend\Livewire\BlogPost\BlogPostCreate;
use GrassFeria\StarterkidFrontend\Livewire\Front\Service\FrontServiceShow;
use GrassFeria\StarterkidFrontend\Livewire\Front\Service\FrontServiceIndex;
use GrassFeria\StarterkidFrontend\Livewire\Front\BlogPost\FrontBlogPostShow;
use GrassFeria\StarterkidFrontend\Livewire\Front\BlogPost\FrontBlogPostIndex;






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
    Route::get(config('starterkid-frontend.service_slug'),FrontServiceIndex::class)->name('front.service.index');
    Route::get(config('starterkid-frontend.service_slug').'/{slug}',FrontServiceShow::class)->name('front.service.show')->middleware('cache');
    Route::get(config('starterkid-frontend.blog_post_slug'),FrontBlogPostIndex::class)->name('front.blog-post.index');
    Route::get(config('starterkid-frontend.blog_post_slug').'/{slug}',FrontBlogPostShow::class)->name('front.blog-post.show')->middleware('cache');
   
   

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   
    Route::get('/dashboard/services',ServiceIndex::class)->name('services.index');
    Route::get('/dashboard/services/create',ServiceCreate::class)->name('services.create');
    Route::get('/dashboard/services/edit/{recordId}',ServiceEdit::class)->name('services.edit');
    Route::get('/dashboard/blog',BlogPostIndex::class)->name('blogposts.index');
    Route::get('/dashboard/blog/create',BlogPostCreate::class)->name('blogposts.create');
    Route::get('/dashboard/blog/edit/{recordId}',BlogPostEdit::class)->name('blogposts.edit');
    Route::get('/dashboard/organization/edit',OrganizationEdit::class)->name('organization.edit');

    


   
});
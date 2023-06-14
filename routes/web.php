<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterRolesPermissionController;
use App\Http\Controllers\DisplayPagesController;
use App\Http\Controllers\RegisterPagesController;
use App\Http\Controllers\RegisterRolesControllerr;
use App\Http\Controllers\RegisterUsersController;
use App\Http\Controllers\RegisterPostController;
use App\Http\Controllers\MarkSheetController;
use App\Http\Controllers\LoginOutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TopicsController;

Route::get('/welcome', function () { return view('welcome'); });
Route::get('/app', function () { return view('layouts.app'); });
Route::get('/login', [DisplayPagesController::class, 'loginpage']) -> name('login');



/* Display all pages from the following routes */
Route::get('/', [DisplayPagesController::class, 'indexpage']) -> name('main');
Route::get('/report', [DisplayPagesController::class, 'report']) -> name('report');
Route::get('/marksheet', [MarkSheetController::class, 'index']) -> name('marksheet');
Route::get('/index', [DisplayPagesController::class, 'index']) -> name('index');
Route::get('/go2roles', [RegisterRolesControllerr::class, 'index']) -> name('go2roles');
Route::get('/go2users', [RegisterUsersController::class, 'index']) -> name('go2users');
Route::get('/go2posts', [RegisterPostController::class, 'index']) -> name('go2posts');
Route::get('/go2profile', [ProfilesController::class, 'index']) -> name('go2profile');
Route::get('/go2subject', [SubjectController::class, 'index']) -> name('go2subject');
Route::get('/go2topic', [TopicsController::class, 'index']) -> name('go2topic');
Route::get('/about', [DisplayPagesController::class, 'aboutpage']) -> name('about');
Route::get('/contact', [DisplayPagesController::class, 'contactpage']) -> name('contact');
Route::get('/dev', [DisplayPagesController::class, 'Developer']) -> name('dev');
Route::get('/dash', [RegisterPagesController::class, 'index']) -> name('dash');
Route::get('/search-live', [SearchController::class, 'index']) -> name('search-live');


Route::get('/search', [SearchController::class, 'search'])->name('categorysearch');


  /* Handle all restricted routes to prevent them from users accessing various pages */
Route::middleware(['auth'])->group(function(){  
});

/* Handle all crude querris with the resource routes */
Route::resource('/crudepages', RegisterPagesController::class); 
Route::resource('/cruderoles', RegisterRolesControllerr::class); 
Route::resource('/crudeuser', RegisterUsersController::class); 
Route::resource('/crudepost', RegisterPostController::class); 
Route::resource('/crudemarks', MarkSheetController::class); 
Route::resource('/crudeprofile', ProfilesController::class); 
Route::resource('/crudesubject', SubjectController::class); 
Route::resource('/crudetopic', TopicsController::class); 

/* Handle other saves to the database here */
Route::post('save-post', [RegisterUsersController::class, 'storepost'])->name('save-post');
Route::post('update-rolesperm-data', [RegisterRolesControllerr::class, 'SavePermissions'])->name('update-rolesperm-data');

/* Handle all login authentications here */
Route::post('accept-users', [LoginOutController::class, 'authenticateusers'])->name('accept-users'); 

/*******############################ Signouts only ####################################***************/
Route::get('sign-out', [LoginOutController::class, 'signout']) -> name('sign-out');

/* Perfom an import and export for spreedsheet */
/* Handel all imports here */
Route::post('/impo-marks', [MarkSheetController::class, 'ImportSheet']) -> name('impo-marks');

/* Handel all exports here */
Route::get('/expo-marks', [MarkSheetController::class, 'ExportSheet']) -> name('expo-marks');
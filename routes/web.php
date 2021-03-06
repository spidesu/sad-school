<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth:sanctum', 'verified'])->get('/representatives', function () {
    return Inertia\Inertia::render('Representatives');
})->name('representatives');

Route::group([
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('/', function () {
        return Inertia\Inertia::render('Students');
    })->name('students');
    Route::get('/students', function () {
        return Inertia\Inertia::render('Students');
    })->name('students');

    Route::get('/teachers', function () {
        return Inertia\Inertia::render('Teachers');
    })->name('teachers');

    Route::get('/departments', function () {
        return Inertia\Inertia::render('Departments');
    })->name('departments');
    Route::get('/groups', function () {
        return Inertia\Inertia::render('Groups');
    })->name('groups');
    Route::get('/dictionaries', function () {
        return Inertia\Inertia::render('Dictionaries');
    })->name('dictionaries');
    Route::get('/program/{id}', function ($id) {
        return Inertia\Inertia::render('Program', ['programId' => $id]);
    })->name('program');
    Route::get('/schedules', function () {
        return Inertia\Inertia::render('Schedules');
    })->name('schedules');
    Route::get('/reports', function () {
        return Inertia\Inertia::render('Reports');
    })->name('reports');
    Route::get('/sheets', function () {
        return Inertia\Inertia::render('Sheets');
    })->name('sheets');

});
Route::namespace('App\Http\Controllers')->group( function (){
    Route::get('/student/issue/{student_id}', 'ReportController@getPersonalIssue');
    Route::get('/teacher/issue/{teacher_id}', 'ReportController@getTeacher');
    Route::get('/test', 'ReportController@testReport');
    Route::get('/cadrReport', 'ReportController@cadrReport');
    Route::get('/groups/report', 'ReportController@groupReport');
    Route::post('/reports/sheetReport', "ReportController@sheetReport")->name('sheetReport');
});

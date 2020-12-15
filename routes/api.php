<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers')->group( function (){
    Route::get('students_form','StudentController@form');
    Route::get('teachers_form','TeacherController@form');
    Route::get('courses/dictionary', 'CourseController@dictionary');
    Route::get('students/dictionary', 'StudentController@dictionary');
    Route::get('teachers/dictionary', 'TeacherController@dictionary');
    Route::get('groups/dictionary', 'GroupController@dictionary');
    Route::get('subjects/dictionary', 'SubjectController@dictionary');
    Route::get('students/sheet/{student_id}', 'StudentController@sheet');
    Route::get('sheets/form', 'SheetController@form');
    Route::post('groups/search', 'GroupController@search');
    Route::post('groups/addStudent', "GroupController@addStudent");
    Route::post('groups/addTeacher', "GroupController@addTeacher");
    Route::post('groups/deleteStudent', "GroupController@deleteStudent");
    Route::post('groups/deleteTeacher', "GroupController@deleteTeacher");
    Route::get('specializations/dictionary/{course_id}', "SpecializationController@dictionary");
    Route::delete('dictionary/{dic_id}/{item_id}', 'DictionaryController@destroy');
    Route::apiResource('dictionary', 'DictionaryController');
    Route::apiResource('students', 'StudentController');
    Route::apiResource('teachers', 'TeacherController');
    Route::apiResource('departments', 'DepartmentController');
    Route::apiResource('programs', 'ProgramController');
    Route::apiResource('groups', 'GroupController');
    Route::apiResource('courses', 'CourseController');
    Route::apiResource('representatives', 'RepresentativeController');
    Route::apiResource('subjects', 'SubjectController');
    Route::apiResource('schedules', 'ScheduleController');
    Route::apiResource('specializations', 'SpecializationController');
    Route::apiResource('educationalForms', 'EducationFormController');
    Route::apiResource('sheets', 'SheetController');


});

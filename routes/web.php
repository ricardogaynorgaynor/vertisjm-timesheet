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
    return redirect('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

Route::get('/home/{project_id?}', 'ProjectController@getAllProjectAssignedToEmployee')->name('home.route');

Route::get('/clients', [
    'middleware' => 'admin',
    'uses' => 'ClientController@index',
    'as' => 'client.view'
]);

Route::get('/add-client', [
    'middleware' => 'admin',
    'uses' => 'ClientController@create',
    'as' => 'client.addnew'
]);

Route::post('/register-client', [
    'middleware' => 'admin',
    'uses' => 'ClientController@store',
    'as' => 'client.register'
]);

Route::get('/projects', [
    'middleware' => 'admin',
    'uses' => 'ProjectController@index',
    'as' => 'project.view'
]);

Route::post('/project-add', [
    'middleware' => 'admin',
    'uses' => 'ProjectController@store',
    'as' => 'project.add'
]);

Route::get('/employees', [
    'middleware' => 'admin',
    'uses' => 'EmployeeController@index',
    'as' => 'employee.view'
]);

Route::get('/employees/new', [
    'middleware' => 'admin',
    'uses' => 'EmployeeController@create',
    'as' => 'employee.create'
]);

Route::post('/employees/stroe', [
    'middleware' => 'admin',
    'uses' => 'EmployeeController@store',
    'as' => 'employee.store'
]);

Route::get('/project/assign/{project_id}', [
    'middleware' => 'admin',
    'uses' => 'EmployeeController@assign',
    'as' => 'assign-project'
]);

Route::get('/project/asignproject/{project_id}/{employee_id}', [
    'middleware' => 'admin',
    'uses' => 'EmployeeController@assignProject',
    'as' => 'assign-to-employee'
]);

Route::post('/add-task/{project_id}', [
    'middleware' => 'admin',
    'uses' => 'TaskController@store',
    'as' => 'task.submit'
]);

Route::get('/employee/profile/{employee_id}', [
    'uses' => 'EmployeeController@getEmployeeProfile',
    'as' => 'employee.getEmployeeProfile'
]);

Route::get('/employee/edit', [
    'middleware' => 'employee',
    'uses' => 'EmployeeController@edit',
    'as' => 'employee.edit'
]);


Route::post('/employee/update', [
    'middleware' => 'employee',
    'uses' => 'EmployeeController@update',
    'as' => 'employee.update'
]);

Route::get('/project/{project_id}', [
    'middleware' => 'admin',
    'uses' => 'ProjectController@show',
    'as' => 'project.view.byid'
]);

Route::get('/approve-task/{task_id}', [
    'middleware' => 'admin',
    'uses' => 'TaskController@approve',
    'as' => 'task.approve'
]);

Route::get('/delete-employee/{employee_id}', [
    'middleware' => 'admin',
    'uses' => 'EmployeeController@destroy',
    'as' => 'employee.delete'
]);

Route::get('/project/edit/{project_id}', [
    'middleware' => 'admin',
    'uses' => 'ProjectController@updateView',
    'as' => 'edit.project'
]);

Route::post('/project/edit/post/{id}', [
    'middleware' => 'admin',
    'uses' => 'ProjectController@update',
    'as' => 'edit.project.post'
]);

Route::get('/client/profile/{id}', [
    'middleware' => 'admin',
    'uses' => 'ClientController@getClientProfile',
    'as' => 'client.profile'
]);

Route::get('/client/edit/{id}', [
    'middleware' => 'admin',
    'uses' => 'ClientController@editclient',
    'as' => 'client.profile.edit'
]);

Route::post('/client/edit/post/{id}', [
    'uses' => 'ClientController@update',
    'as' => 'client.edit.post'
]);

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('home.route');
});

Route::get('/admin/edit-profile', [
    'middleware' => 'admin',
    'uses' => 'ManagerController@edit',
    'as' => 'manager.edit'
]);

Route::get('/admin/view-profile/{id}', [
    'middleware' => 'admin',
    'uses' => 'ManagerController@show',
    'as' => 'manager.profile'
]);

Route::post('/admin/manager/update-profile', [
    'middleware' => 'admin',
    'uses' => 'ManagerController@update',
    'as' => 'manager.update'
]);

Route::get('/managers', [
    'middleware' => 'admin',
    'uses' => 'ManagerController@index',
    'as' => 'manager.view'
]);

Route::get('/accessdenied', [
    'uses' => 'HomeController@accessdenied',
    'as' => 'accessdenied'
]);


});

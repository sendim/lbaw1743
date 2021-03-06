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

/* ========> Mark admin */

Route::get('/admin', 'Admin\AdminController@show')->middleware('admin');

// logout
Route::get('/admin/logout', function(){
  Auth::logout();

  return redirect('/admin');
});

// route to process the login form
Route::post('/admin/login', 'Admin\AdminController@login')->name('/admin/login');

Route::get('/admin/users', 'Admin\AdminUsersController@show')->middleware('auth')->middleware('admin');
Route::post('/admin/users/promote', 'Admin\AdminUsersController@promoteUsers')->middleware('auth')->middleware('admin');
Route::post('/admin/users/ban', 'Admin\AdminUsersController@banUsers')->middleware('auth')->middleware('admin');
Route::post('/admin/users/remove', 'Admin\AdminUsersController@removeUsers')->middleware('auth')->middleware('admin');
Route::post('/admin/users/', 'Admin\AdminUsersController@search')->middleware('auth')->middleware('admin');

Route::get('/admin/projects', 'Admin\AdminProjectsController@show')->middleware('auth')->middleware('admin');
Route::post('/admin/projects/remove', 'Admin\AdminProjectsController@removeProjects')->middleware('auth')->middleware('admin');
Route::post('/admin/projects', 'Admin\AdminProjectsController@search')->middleware('auth')->middleware('admin');

Route::get('/admin/tasks', 'Admin\AdminTasksController@show')->middleware('auth')->middleware('admin');
Route::post('/admin/tasks/remove', 'Admin\AdminTasksController@removeTasks')->middleware('auth')->middleware('admin');
Route::post('/admin/tasks', 'Admin\AdminTasksController@search')->middleware('auth')->middleware('admin');

Route::get('/admin/comments', 'Admin\AdminCommentsController@show')->middleware('auth')->middleware('admin');
Route::post('/admin/comments/remove', 'Admin\AdminCommentsController@removeComments')->middleware('auth')->middleware('admin');
Route::post('/admin/comments', 'Admin\AdminCommentsController@search')->middleware('auth')->middleware('admin');

/* =========> MARK: app */

Route::get('/','HomeController@show');

// login
Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@login')->name('login');

// register
Route::get('register', 'HomeController@showRegisterModal');
Route::post('register', 'HomeController@register')->name('register');

// logout
Route::get('/logout', function(){
  Auth::logout();
  return redirect('/');
});

// Password Reset Routes...
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset/', 'Auth\ResetPasswordController@reset')->name('password.request');

// dashboard

Route::get('/dashboard', 'Dashboard\DashboardController@show')->middleware('auth');

Route::get('/dashboard/tasks', 'Dashboard\DashboardTasksController@show')->middleware('auth');
Route::post('/dashboard/tasks', 'Dashboard\DashboardTasksController@search')->middleware('auth');
Route::get('/dashboard/tasks/completed', 'Dashboard\DashboardTasksController@showCompleted')->middleware('auth');
Route::post('/dashboard/tasks/completed', 'Dashboard\DashboardTasksController@searchCompleted')->middleware('auth');

Route::get('/dashboard/projects', 'Dashboard\DashboardProjectsController@show')->middleware('auth');
Route::post('/dashboard/projects', 'Dashboard\DashboardProjectsController@search')->middleware('auth');

// project

Route::get('/dashboard/new-project', 'Dashboard\DashboardNewProjectController@show')->middleware('auth');
Route::post('/dashboard/new-project/', 'Dashboard\DashboardNewProjectController@newProject');

Route::get('/project/{id}', function($id){
  return redirect('/project/'.$id.'/tasks');
});

Route::get('/project/{id}/tasks', 'Project\ProjectTasksController@show')->middleware('project');
Route::get('/project/{id}/tasks/unassigned', 'Project\ProjectTasksController@showUnassigned')->middleware('project');
Route::get('/project/{id}/tasks/completed', 'Project\ProjectTasksController@showCompleted')->middleware('project');

Route::get('/project/{id}/members', 'Project\ProjectMembersController@show')->middleware('project');
Route::get('/project/{id}/members/manager', 'Project\ProjectMembersController@showManager')->middleware('project');
Route::get('/project/{id}/members/member', 'Project\ProjectMembersController@showMember')->middleware('project');

Route::get('/project/{id}/options', 'Project\ProjectOptionsController@show')->middleware('project')->middleware('owner');
Route::post('/project/{id}/options', 'Project\ProjectOptionsController@editProject')->middleware('project')->middleware('owner');

Route::get('/project/{id}/options/delete', 'Project\ProjectOptionsController@deleteProject')->middleware('project')->middleware('owner');

Route::get('/project/{id}/manage_tasks', 'Project\ProjectManageTasksController@show')->middleware('project')->middleware('manager');
Route::post('/project/{id}/manage_tasks', 'Project\ProjectManageTasksController@search')->middleware('project')->middleware('manager');
Route::post('/project/{id}/manage_tasks/remove', 'Project\ProjectManageTasksController@remove')->middleware('project')->middleware('manager');

Route::get('/project/{id}/manage_users', 'Project\ProjectManageUsersController@show')->middleware('project')->middleware('manager');
Route::post('/project/{id}/manage_users', 'Project\ProjectManageUsersController@search')->middleware('project')->middleware('manager');
Route::post('/project/{id}/manage_users/remove', 'Project\ProjectManageUsersController@remove')->middleware('project')->middleware('manager');
Route::post('/project/{id}/manage_users/update', 'Project\ProjectManageUsersController@update')->middleware('project')->middleware('manager');

Route::get('/project/{id}/join', 'Project\ProjectController@join')->middleware('project');
Route::get('/project/{id}/leave', 'Project\ProjectController@leave')->middleware('project')->middleware('member');

Route::get('/project/{id}/new-task', 'Project\ProjectNewTaskController@show')->middleware('project')->middleware('member');
Route::post('/project/{id}/new-task', 'Project\ProjectNewTaskController@newTask')->middleware('project')->middleware('member');

Route::get('/project/{id}/new-post', 'Project\ProjectNewPostController@show')->middleware('project')->middleware('member');
Route::post('/project/{id}/new-post', 'Project\ProjectNewPostController@newPost')->middleware('project')->middleware('member');

// forum
Route::get('/project/{id}/forum', 'Project\ProjectForumController@show')->middleware('project');
Route::get('/project/{id}/forum/{idPost}/new-reply', 'Post\PostNewReplyController@show')->middleware('project')->middleware('member');
Route::post('/project/{id}/forum/{idPost}/new-reply', 'Post\PostNewReplyController@newReply')->middleware('project')->middleware('member');
// search
Route::post('/search', 'Search\SearchController@search')->name('/search');

// Route::get('/search/{text}', function($text){
//   return redirect('/search/'.$text.'/projects');
// });

Route::get('/search/{text}', 'Search\SearchController@show');

Route::get('/search/{text}/projects', 'Search\SearchProjectsController@show');

Route::get('/search/{text}/tasks', 'Search\SearchTasksController@show');

Route::get('/search/{text}/users', 'Search\SearchUsersController@show');

// task

Route::get('project/{id}/task/{idTask}', 'Task\TaskController@show')->middleware('project')->middleware('task');
Route::get('project/{id}/task/{idTask}/delete', 'Task\TaskController@delete')->middleware('project')->middleware('task')->middleware('deleteTask');

Route::get('project/{id}/task/{idTask}/assign', 'Task\TaskController@assign')->middleware('project')->middleware('task')->middleware('assignTask');
Route::get('project/{id}/task/{idTask}/unassign', 'Task\TaskController@unassign')->middleware('project')->middleware('task')->middleware('unassignTask');

Route::get('project/{id}/task/{idTask}/edit', 'Task\TaskEditController@show')->middleware('project')->middleware('task')->middleware('editTask');
Route::post('project/{id}/task/{idTask}/edit', 'Task\TaskEditController@editTask')->middleware('project')->middleware('task')->middleware('editTask');

Route::post('project/{id}/task/{idTask}/comment', 'Task\TaskEditController@postComment')->middleware('project')->middleware('task')->middleware('commentTask');
Route::get('project/{id}/task/{idTask}/delete-comment/{idComment}', 'Task\TaskEditController@deleteComment')->middleware('project')->middleware('task')->middleware('deleteComment');

Route::get('project/{id}/task/{idTask}/new-cr', 'Task\TaskNewCloseRequestController@show')->middleware('project')->middleware('task')->middleware('closeRequest');
Route::post('project/{id}/task/{idTask}/new-cr', 'Task\TaskNewCloseRequestController@newCloseRequest')->middleware('project')->middleware('task')->middleware('closeRequest');
Route::get('project/{id}/task/{idTask}/approve-cr/{idRequest}', 'Task\TaskEditController@complete')->middleware('project')->middleware('task')->middleware('completeCloseRequest');

// tags

Route::post('project/{id}/task/{idTask}/add-tag', 'Task\TaskEditController@addTag')->middleware('project')->middleware('task');
Route::get('project/{id}/task/{idTask}/remove-tag/{idTag}', 'Task\TaskEditController@removeTag')->middleware('project')->middleware('task');

// profile

Route::get('/profile/{id}', 'ProfileController@show')->middleware('profile');

Route::get('/profile/{id}/edit', 'ProfileController@showEditModal')->middleware('profile');
Route::post('/profile/{id}/edit', 'ProfileController@editProfile')->middleware('profile');

Route::get('/profile/{id}/delete', 'ProfileController@deleteProfile')->middleware('profile');

// contact

Route::get('/contact', 'ContactController@show');

// about

Route::get('/about', 'AboutController@show');

// faq

Route::get('/faq', 'FaqController@show');

// Premium
Route::get('/premium', 'PremiumController@show')->middleware('auth');
Route::post('/premium/buy', 'PremiumController@buy')->middleware('auth');

//Route::get('/home', 'HomeController@index')->name('home');

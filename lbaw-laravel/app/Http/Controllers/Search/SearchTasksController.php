<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Model\Project;
use App\Model\User;
use App\Model\Task;

class SearchTasksController extends Controller{
  public function show($text){
    $projects = Project::nameDescriptionPublic($text)->get();
    $tasks = DB::table('task')->join('project', 'project.idproject', '=', 'task.idproject')->where('project.private', '=', 'false')
    ->where('task.title', 'like', "%{$text}%")->orWhere('task.description', 'like', "%{$text}%")->get();
    $users = User::usernameName($text)->get();

    return view('search.tasks_card',
    ['text' => $text,
    'countProjects' => $projects->count(),
    'countTasks' => $tasks->count(),
    'countUsers' => $users->count(),
    'tasks' => $tasks]);
  }
}

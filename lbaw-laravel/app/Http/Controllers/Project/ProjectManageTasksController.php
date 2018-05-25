<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Model\Project;
use App\Model\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Controllers\Task\TaskController;

class ProjectManageTasksController extends Controller
{
  public function show($id)
  {
    $project = Project::findOrFail($id);

    return view('project.manage_tasks_card', ['project' => $project]);
  }

  public function remove(Request $request, $id){
    $project = Project::findOrFail($id);
    $data = $request->all();

    foreach($project->tasks as $task){
      if(isset($data['task'.$task->idtask])){
        TaskController::delete($id, $task->idtask);
      }
    }

    $project->lasteditdate = date('Y-m-d H:i:s', strtotime(Carbon::now()));
    $project->save();

    return redirect('/project/'.$id.'/manage_tasks');
  }
}

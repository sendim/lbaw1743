<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Model\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProjectManageUsersController extends Controller{
  public function show($id){
    $project = Project::findOrFail($id);

    return view('project.manage_users_card', ['project' => $project, 'members' => $project->members]);
  }

  public function search(Request $request, $id){
    $project = Project::findOrFail($id);
    $text = $request->input('search-users');

    if(is_null($text)){
      return redirect()->back();
    }
    else{
      $members = $project->members()->where('username', 'ilike', "%{$text}%")->get();
    }

    return view('project.manage_users_card', ['project' => $project, 'members' => $members]);
  }

  public function remove(Request $request, $id){
    $project = Project::findOrFail($id);
    $data = $request->all();

    foreach($project->members as $member){
      if(isset($data['user'.$member->iduser])){
        $project->members()->detach($member->iduser);

        $tasks = $project->tasks()->get();
        foreach($tasks as $task){
          $task->assigned()->detach($member->iduser);
        }
      }
    }

    $project->lasteditdate = date('Y-m-d H:i:s', strtotime(Carbon::now()));
    $project->save();

    return redirect('/project/'.$id.'/manage_users');
  }

  public function update(Request $request, $id){
    $project = Project::findOrFail($id);
    $data = $request->all();

    if(count(array_keys(array_values($data), "Owner")) != 1){
      return redirect('/project/'.$id.'/manage_users');
    }

    foreach($project->members as $member){
      $member->pivot->role = $data['role'.$member->iduser];
      $member->pivot->save();
    }

    $project->lasteditdate = date('Y-m-d H:i:s', strtotime(Carbon::now()));
    $project->save();

    return redirect('/project/'.$id.'/manage_users');
  }
}

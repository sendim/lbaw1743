@extends('dashboard.dashboard-layout')

@section('title', 'Tasks')

@section('card-header')
<div class="row">
  <div class="col-md-3">
    <h5>My Tasks</h5>
  </div>
  <div class="col-md-5">
    <nav class="nav nav-pills">
      @if (strpos($_SERVER['REQUEST_URI'], 'completed') !== false)
      <a class="nav-link" href="{{ url('/dashboard/tasks') }}">Assigned</a>
      <a class="nav-link active" href="{{ url('/dashboard/tasks/completed') }}">Completed</a>
      @else
      <a class="nav-link active" href="{{ url('/dashboard/tasks') }}">Assigned</a>
      <a class="nav-link" href="{{ url('/dashboard/tasks/completed') }}">Completed</a>
      @endif
    </nav>
  </div>
  <div class="col md-4">
    {{-- search input --}}
    @if (strpos($_SERVER['REQUEST_URI'], 'completed') !== false)
    @include('layouts.search-input', ['name' => 'my_tasks_search_input', 'search' => 'search-my-tasks', 'url' => '/dashboard/tasks/completed'])
    @else
    @include('layouts.search-input', ['name' => 'my_tasks_search_input', 'search' => 'search-my-tasks', 'url' => '/dashboard/tasks'])
    @endif
  </div>
</div>
@endsection

@section('card-body')
<div class="tasks-card nopadding">
  <div class="card-body">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">
            #
          </th>
          <th scope="col">
            Task Name
          </th>
          <th scope="col">
            Tags
          </th>
          <th scope="col">
            Project
          </th>
        </tr>
      </thead>
      <tbody>

        @foreach($tasks as $task)
        <tr>
          <th scope="row">
            <p class="text-left">{{$task->idtask}}</p>
          </th>
          <td>
            <p class="text-left">
              <a href="{{ url('project/'.$task->project->idproject.'/task/'.$task->idtask) }}">{{$task->title}}</a>
            </p>
          </td>
          <td>
            <p class="text-left">
              @if(count($task->tags) > 0)

              @foreach($task->tags as $tag)
              {{$tag->name}}
              @endforeach

              @else
              none
              @endif
            </p>
          </td>
          <td>
            <p class="text-left">
              <a href="{{ url('project/'.$task->project->idproject) }}">{{$task->project->name}}</a>
            </p>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  @if(count($tasks) > 5)
  <button type="button" class="btn btn-white btn-block m-0 p-0">...</button>
  @endif
</div>
@endsection

<?php use Carbon\Carbon;
$now = Carbon::now();?>

@section('card-footer')

@if(count($tasks) > 0)
<div class="card-footer">
  <small>
    <?php $date = Carbon::parse($tasks->first()->lasteditdate);
    $days = $date->diffInDays($now);
    $hours = $date->diffInHours($now);
    $minutes = $date->diffInMinutes($now);
    $seconds = $date->diffInSeconds($now); ?>
    @if ($days > 0)
    last task activity <a href="">{{ $tasks->first()->title }}</a>, {{ $days }} days ago.
    @elseif ($hours > 0)
    last task activity <a href="">{{ $tasks->first()->title }}</a>, {{ $hours }} hours ago.
    @elseif ($minutes > 0)
    last task activity <a href="">{{ $tasks->first()->title }}</a>, {{ $minutes }} minutes ago.
    @else
    last task activity <a href="">{{ $tasks->first()->title }}</a>, {{ $seconds }} seconds ago.
    @endif
  </small>
</div>
@endif

@endsection

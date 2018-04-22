@extends('search.search-layout')

@section('title', 'Tasks')

@section('card-header')
<div class="row">
  <div class="col-6">
    <h5 class="panel-title">Tasks</h5>
  </div>
  <div class="col-6">
    <div class="dropdown panel-button">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort by
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Best results</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('card-body')
@foreach ($search_title as $task)
<div class="card">
  <div class="card-header">
    <p>#{{$task->idtask}} - {{$task->title}}</p>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-6">
        <p class="text-left">
          <b>Project Name</b>
        </p>
      </div>
      <div class="col-6">
        <p class="text-right">
          @jotapsa
        </p>
      </div>
    </div>
    <p>{{$task->description}}</p>
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-6">
        <p class="text-left">
          last updated 2 days ago.
        </p>
      </div>
      <div class="col-6 text-right">
        <span class="octicon octicon-comment-discussion"/>
        <span class="octicon octicon-organization"/>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

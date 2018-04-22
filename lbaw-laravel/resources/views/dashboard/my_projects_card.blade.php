@extends('dashboard.dashboard-layout')

@section('title', 'My Projects')

@section('card-header')
<div class="row">
  <div class="col-md-4">
    <h5 class="panel-title">My Projects</h5>
  </div>
  <div class="col-md-4">
    <nav class="nav nav-pills">
      <a class="nav-link active" href="#">Last seen</a>
      <a class="nav-link" href="#">All</a>
    </nav>
  </div>
  <div class="col md-4">
    {{-- search input --}}
    @include('layouts.search-input', ['name' => 'my_projects_search_input'])
  </div>
</div>
@endsection

@section('card-body')
<a class="create-new-project" href="{{ url('dashboard/new-project')}}">
  <button type="button" class="btn btn-outline-light btn-block create-new-project-button">
    + create new project
  </button>
</a>
  {{-- projects card --}}

  @foreach($user->projects as $project)
    @include('layouts.project_card', ['project' => $project])
  @endforeach

@endsection

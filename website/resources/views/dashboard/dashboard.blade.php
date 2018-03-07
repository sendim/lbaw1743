@extends('layouts.dashboard-layout')

@section('title', 'Dashboard')

@section('menu')

<div class="container-fluid dashboard-menu">
    <link rel="stylesheet" href="templates/dashboard/menu.css"/>
    
    <div class="list-group">
        <a href="dashboard.php" class="list-group-item list-group-item-action header" role="button">
            Dashboard
        </a>
        <a href="dashboard_my_projects.php" class="list-group-item list-group-item-action" role="button">
            My Projects
        </a>
        <a href="dashboard_tasks.php" class="list-group-item list-group-item-action" role="button">
            Tasks
        </a>
        <a href="#" class="list-group-item list-group-item-action" role="button">
            Public Projects
        </a>
    </div>
</div>

@endsection

@section('panel')

<div class="dashboard-panel">
    <div class="card">
        <div class="card-header panel-header">
            <div class="grid">
                <div class="row">
                    <div class="col-7">
                        <h5 class="panel-title">Dashboard</h5>
                    </div>
                    <div class="col-5">
                        <div class="dropdown panel-button">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Most recent</a>
                                <a class="dropdown-item" href="#">Oldest</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="media">
                <img src="images/task-placeholder.svg" alt="Dashboard Image">
                <div class="media-body">
                    @mateus created task #133 - Finish Design on project Manager.
                </div>
            </div>
            <div class="media">
                <img class="align-self-center mr-1" src="images/task-placeholder.svg" alt="Dashboard Image">
                <div class="media-body">
                    New people invited to project Project name.>
                    <small>@mateus @joao were added to project Project name as members.</small>
                </div>
            </div>
            <div class="media">
                <img class="align-self-center mr-1" src="images/task-placeholder.svg" alt="Dashboard Image">
                <div class="media-body">
                    @mateus closed task #923 - Do this on project Project 2.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
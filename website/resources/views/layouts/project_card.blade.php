<div class="card project-card">
    <img class="card-img-top img-responsive" src="img/task-placeholder.svg">
    <div class="card-body text-center">
        <h5>Project Name</h5>
        <div class="btn-group">
            
            <button type="button" class="btn btn-terciary">
                <a href="{{ url('projects_tasks')}}">
                    <span  class="octicon octicon-clippy"></span>
                </a>
            </button>
            
            <button type="button" class="btn btn-secondary">
                <a href="{{ url('project_forum')}}">
                    <span  class="octicon octicon-comment-discussion"></span>
                </a>
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url('project_options') }}">
                    <span  class="octicon octicon-tools"></span>
                </a>
            </button>
        </div>
    </div>
</div>
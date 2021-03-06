<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'admin' => \App\Http\Middleware\Admin\CheckAdminUser::class,
        'project' => \App\Http\Middleware\Project\CheckCanSeeProject::class,
        'owner' => \App\Http\Middleware\Project\ProjectOwnerOptions::class,
        'manager' => \App\Http\Middleware\Project\ProjectManager::class,
        'member' => \App\Http\Middleware\Project\ProjectMember::class,
        'task' => \App\Http\Middleware\Task\TaskBelongsProject::class,
        'editTask' => \App\Http\Middleware\Task\UserEditTask::class,
        'deleteTask' => \App\Http\Middleware\Task\UserDeleteTask::class,
        'assignTask' => \App\Http\Middleware\Task\UserAssignTask::class,
        'unassignTask' => \App\Http\Middleware\Task\UserUnassignTask::class,
        'commentTask' => \App\Http\Middleware\Task\UserCommentTask::class,
        'deleteComment' => \App\Http\Middleware\Task\UserDeleteComment::class,
        'closeRequest' => \App\Http\Middleware\Task\CreateCloseRequest::class,
        'completeCloseRequest' => \App\Http\Middleware\Task\CompleteCloseRequest::class,
        'profile' => \App\Http\Middleware\Profile\CheckCanSeeProfile::class,
    ];
}

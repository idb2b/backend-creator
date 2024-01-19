<?php

namespace App\Http\Middleware;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Inertia\Response;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = "app";

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $environment = config("app.env");

        return array_merge(parent::share($request), [
            "flash" => [
                "success" => fn() => $request->session()->get("success"),
                "error" => fn() => $request->session()->get("error"),
            ],

            "environment" => $environment,

            "currentUserTeamRole" =>
                Auth::user() &&
                Auth::user()->current_team_id !== 0 &&
                Auth::user()->current_team_id
                    ? Auth::user()->teamRole(
                        Team::find(Auth::user()->current_team_id)
                    )
                    : null,

            "currentUserTeam" =>
                Auth::user() &&
                Auth::user()->current_team_id !== 0 &&
                Auth::user()->current_team_id
                    ? Team::find(Auth::user()->current_team_id)
                    : null,
        ]);
    }
}

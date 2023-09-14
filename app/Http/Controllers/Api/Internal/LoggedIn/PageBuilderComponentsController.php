<?php

namespace App\Http\Controllers\Api\Internal\LoggedIn;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\PageBuilder\PageBuilderComponent;
use App\Models\Superadmin\PageBuilder\PageBuilderComponentCategory;
use App\Models\Team;
use Illuminate\Http\Request;

class PageBuilderComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Team $team)
    {
        $this->authorize("can-read", $team);

        $componentsCategories = PageBuilderComponentCategory::all();

        if (auth()->user()->superadmin === null) {
            // User is not a superadmin, so only fetch components with published as true

            $components = PageBuilderComponent::with("coverImages")
                ->with("categories")
                ->where("published", true)
                ->get();
        }

        if (auth()->user()->superadmin !== null) {
            $components = PageBuilderComponent::with("coverImages")
                ->with("categories")
                ->get();
        }

        return [
            "component_categories" => $componentsCategories,
            "components" => $components,
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

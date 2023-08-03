<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resources\Create;
use App\Http\Requests\Resources\Edit;
use App\Http\Requests\Resources\Update;
use App\Models\Resource;
use App\Queries\ResourcesQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{

    public function __construct(
        protected ResourcesQueryBuilder $resourcesQueryBuilder
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/resources', ['resources' => $this->resourcesQueryBuilder->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms/Resources/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request): RedirectResponse
    {
        $resource = Resource::create($request->validated());

        if($resource){
            return redirect()->route('admin.resources.index')->with('success', 'resource added');
        }

        return redirect()->route('admin.resources.index')->with('error', 'resource has not been added');
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
    public function edit(Resource $resource)
    {
        return view('forms/Resources/edit', ['resource' => $resource]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Resource $resource)
    {
        $resource = $resource->fill($request->validated());

        if($resource->save()){
            return redirect()->route('admin.resources.index')->with('success', 'resource added');
        }

        return redirect()->route('admin.resources.index')->with('error', 'resource has not been added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

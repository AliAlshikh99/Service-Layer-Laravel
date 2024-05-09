<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return ['message' => 'You can read all projects'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        return ['message' => 'You can create new project'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return ['message' => 'You can show this project'];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

        return ['message' => 'You can update  project'];
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        return ['message' => 'You can delete project'];
        //
    }
}

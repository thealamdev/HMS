<?php

namespace App\Http\Controllers\Backend\RoleAssign;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RoleAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $user_roles = User::with('roles')->get();
        return $user_roles;
        return view('Backend.role-assign.index');
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

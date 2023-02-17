<?php

namespace App\Http\Controllers\Backend\RolePermission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->whereNotIn('name',['super-admin'])->get();
        // return $roles;
        return view('Backend.role-permission.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get(['id','name']);
        return view('Backend.role-permission.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
        ]);
        return back()->with('success','Permission Added !!!');
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
        return view('Backend.role-permission.edit');
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
        $role = Role::find($id);
        $role->delete();
        return back()->with('success','Role Delete succssfull');
        
    }

    public function RolePermission(Request $request){
        // return $request;
         $valided = [
            'name' => 'required',
            'permssions' => 'required'
         ];

         if($valided){
            $role = new Role();
            $role->name = $request->name;
            $role->save();

            $role->givePermissionTo($request->permssions);
            return redirect(route('dashboard.role-pemission.index'))->with('success','Role and Permission Added !!!');
         }
    }
}

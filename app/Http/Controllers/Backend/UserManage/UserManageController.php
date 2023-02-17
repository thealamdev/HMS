<?php

namespace App\Http\Controllers\Backend\UserManage;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $users = User::with(['roles'=>function($q){
            $q->select(['id','name'])->whereNotIn('name',['super-admin']);
        }])->get(['id','name'])->whereNotIn('name',['super-admin']);
        return view('Backend.user-manage.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $roles = Role::whereNotIn('name',['super-admin'])->get(['id','name']);
        return view('Backend.user-manage.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(),
        ]);

        $user->assignRole($request->role);

        return back();
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
        $user = User::where('id',$id)->with(['roles'=>function($q){
            $q->select('id','name')->whereNotIn('name',['super-admin']);
        }])->get(['id','name','email'])->whereNotIn('name',['super-admin'])->first();
        
        $roles = Role::get(['id','name'])->whereNotIn('name',['super-admin']);
        // return $roles;
        return view('Backend.user-manage.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) 
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $user->syncRoles($request->role);
        return back()->with('success','User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

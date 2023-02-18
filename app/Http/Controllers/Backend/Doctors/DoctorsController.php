<?php

namespace App\Http\Controllers\Backend\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoctorsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::get();
        return view('Backend.doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.doctors.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $valided = $request->validate([
        //     'first_name'=> 'required',
        //     'last_name' => 'required',
        //     'title' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'experience' => 'required',
        //     'fees' => 'required',
             
        //     'degree' => 'required'
        // ]);

        
            $doctors = Doctor::create([
            'first_name'=> $request->fname,
            'last_name' => $request->lname,
            'title' => $request->title,
            'email' =>  $request->email,
            'phone' => $request->number,
            'experience' => $request->experience,
            'fees' => $request->fees,
            'photo' => 'photo.jpg',
            'degree' => $request->degree,
            ]);
        

        return redirect()->route('dashboard.doctors.index')->with('success','Doctors Registration Done');
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

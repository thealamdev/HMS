@extends('layouts.backendApp')
@section('title', 'Doctor - Registration')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Doctors Registration</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.doctors.store') }}" method="POST">
                @csrf
                <div class="row">
                
                    
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="fname">Doctors First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name...">
                        </div>
                        <div class="form-group">
                            <label for="lname">Doctors Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter last Name...">
                        </div>
                        <div class="form-group">
                            <label for="title">Doctors Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter title ...">
                        </div>
                        <div class="form-group">
                            <label for="email">Doctors Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email ...">
                        </div>
                        

                        <button class="btn btn-primary" type="submit">Submit</button>

                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="number">Doctors Contact Number</label>
                            <input type="text" name="number" class="form-control" placeholder="Enter Number ...">
                        </div>

                        <div class="form-group">
                            <label for="experience">Doctotrs Experience</label>
                            <input type="text" name="experience" class="form-control" placeholder="Enter Experience...">
                        </div>
                        <div class="form-group">
                            <label for="fees">Doctors Fees</label>
                            <input type="number" name="fees" class="form-control" placeholder="Enter Fees...">
                        </div>
                        <div class="form-group">
                            <label for="photo">Doctors Photo</label>
                            <input type="file" name="photo" class="form-control" placeholder="Enter Photo ...">
                        </div>
                        <div class="form-group">
                            <label for="degree">Doctors Photo</label>
                            <input type="text" name="degree" class="form-control" placeholder="Enter degree ...">
                        </div>
                         


                    </div>
                

            </div>
            </form>
        </div>
    </div>
@endsection

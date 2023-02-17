@extends('layouts.backendApp')
@section('title', 'Role-Permission')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h3>Permission</h3>
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('dashboard.role-pemission.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Permission Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Permission Name...">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <h3>Role And Permission:</h3>
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('dashboard.role-pemission.role.permission.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Role Name...">
                        </div>
                        <div class="form-group">
                            <label for="permission">Permissions : </label> <br>
                            @foreach ($permissions as $permission)
                                <input type="checkbox" name="permssions[]" value="{{ $permission->id }}">
                                <span>{{ $permission->name }}</span>
                            @endforeach

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('message')
@endsection

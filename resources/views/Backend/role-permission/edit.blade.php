@extends('layouts.backendApp')
@section('title', 'Role - Permission - Edit')
@section('content')
    <div class="row">
    
        <div class="col-lg-6">
            <h3>Role And Permission:</h3>
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('dashboard.role-pemission.update',$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="Enter Role Name...">
                        </div>
                        <div class="form-group">
                            <label for="permission">Permissions : </label> <br>
                            @foreach ($permissions as $permission)
                                <input type="checkbox" name="permssions[]" value="{{ $permission->id }}" @foreach ($role->permissions as $per)
                                    {{ $per->id == $permission->id ? 'checked':'' }}
                                @endforeach>
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

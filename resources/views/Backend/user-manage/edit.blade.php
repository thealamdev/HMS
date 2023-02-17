@extends('layouts.backendApp')
@section('title','User-Edit')
@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card-header">
                <h4>User Create</h4>
            </div>


            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.user-manage.update',$user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">User Name:</label>
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Enter User Name...">
                        </div>

                        <div class="form-group">
                            <label for="email">User Email:</label>
                            <input type="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="Enter User Email...">
                        </div>

                        <div class="form-group">
                            <label for="password">User Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter User Password...">
                        </div>

                        <div class="form-group">
                            <label for="role">User Role:</label>
                            <select name="role" class="form-control">
                                <option disabled selected >Select a Role for User</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @foreach ($user->roles as $Urole)
                                    {{ $Urole->id == $role->id ? 'selected' : '' }}
                                @endforeach>{{ $role->name }}</option>
                                @endforeach
                            </select>
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
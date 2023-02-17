@extends('layouts.backendApp')
@section('title','User-Show')
@section('content')
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>User Name</th>
            <th>User Role Permission</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            <span class="badge rounded-pill bg-warning">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    @can('delete')
                    <td>
                        <a href="{{ route('dashboard.user-manage.edit',$user->id )}}" class="btn btn-primary"><i class="las la-edit"></i></a>
                        <a href="#" class="btn btn-danger"><i class="las la-trash"></i></a>
                    </td>
                    @endcan
                     
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
@endsection
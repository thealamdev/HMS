@extends('layouts.backendApp')
@section('title', 'User-Show')
@section('content')
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>User Name</th>
                <th>User Role</th>
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
                                <a href="{{ route('dashboard.user-manage.edit', $user->id) }}" class="btn btn-primary">
                                    <i class="las la-edit"></i>
                                </a>

                                <form action="{{ route('dashboard.user-manage.delete', $user->id) }}" class="form_submit"
                                    method="POST" style="display:inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-danger delete_btn"><i
                                            class="las la-trash"></i></button>
                                </form>
                            </td>
                        @endcan

                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection


@section('js')

    <script>
        $(document).ready(function() {
            $('.delete_btn').on('click', function() {
                if (confirm('Are you sure you want to delete this user?')) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>

    @include('message')
@endsection

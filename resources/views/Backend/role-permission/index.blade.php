@extends('layouts.backendApp')
@section('title', 'All Role')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Role and Permissin</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Role Name</th>
                            <th>Permission Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge rounded-pill bg-warning">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.role-pemission.edit',$role->id ) }}" class="btn btn-primary"><i class="las la-edit"></i></a>
                                         
                                        <form action="{{ route('dashboard.role-pemission.delete',$role->id) }}" method="POST" style="display:inline-block">
                                            @method('DELETE')
                                            @csrf
                                        <button type="button" class="btn btn-danger delete_btn"><i class="las la-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $(document).ready(function(){
         $('.delete_btn').on('click',function(){
            if(confirm('Are you really want to delete Role ?') == true){
                $(this).closest('form').submit();
            }
         })
    })
</script>
    @include('message')
@endsection

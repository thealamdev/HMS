@extends('layouts.backendApp')
@section('title','Doctors List')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                 
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->title }}</td>
                                <td>{{ $doctor->first_name ." " . $doctor->last_name }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary"><i class="las la-edit"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="las la-trash"></i></a>
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
    @include('message')
@endsection
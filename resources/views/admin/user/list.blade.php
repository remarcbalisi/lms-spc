@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->fname . ' ' . $user->lname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a>
                                            <button type="button" class="btn btn-primary">View</button>
                                        </a>
                                        <a href="{{route('admin-user-edit', ['user_id'=>$user->id])}}">
                                            <button type="button" class="btn btn-warning">Edit</button>
                                        </a>
                                        <a>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

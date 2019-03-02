@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                        <a href="{{route('admin-user-view', ['user_id'=>$user->id])}}">
                                            <button type="button" class="btn btn-primary btn-sm">View</button>
                                        </a>
                                        <a href="{{route('admin-user-edit', ['user_id'=>$user->id])}}">
                                            <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                        </a>
                                        <form action="{{route('admin-user-delete', ['user_id'=>$user->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(session('success_msg'))
                            <div class="alert alert-success" role="alert">
                                {{session('success_msg')}}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin-user-update', ['user_id'=>$user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="fname" value="{{$user->fname}}" class="form-control" placeholder="First name">
                                </div>
                                <div class="col">
                                    <input type="text" name="mname" value="{{$user->mname}}" class="form-control" placeholder="Middle name">
                                </div>
                                <div class="col">
                                    <input type="text" name="lname" value="{{$user->lname}}" class="form-control" placeholder="Last name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    @foreach($roles as $role)
                                        @if($role->id == $user->role_user()->first()->id)
                                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                        @else
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Create</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

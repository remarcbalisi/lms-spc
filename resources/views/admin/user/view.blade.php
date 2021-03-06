@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>{{$user->fname . ' ' . $user->mname . ' ' . $user->lname}}</h3>
                        <p>{{$user->email}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

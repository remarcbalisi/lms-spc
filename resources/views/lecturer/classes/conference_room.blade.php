@extends('lecturer.layouts.app')

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

                        <example-component :user-role="{{Auth::user()->role_user()->first()->role_id}}">

                        </example-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

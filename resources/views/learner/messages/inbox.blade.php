@extends('learner.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Inbox
                        <a href="{{route('learner-new-message')}}">
                            <button type="button" class="btn btn-success btn-sm">Create New</button>
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are in Inbox!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
